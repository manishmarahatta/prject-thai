<?php 
class GalleryManagementController extends AdminController {
	protected $layout = 'layouts.dashboard.master';

	public function __construct(){
		parent::__construct();
		Session::flash('pageTitlte', 'Gallery Management');
		Session::flash('pageCat', 'galleryManagement');
	}

	public function index(){
		$data['images']		=	GalleryImage::orderBy('id','desc')->get();
		$this->layout->content 	= 	View::make('dashboard.gallery.index',$data);
	}

	public function newGallery(){
		$this->layout->content 	=	View::make('dashboard.gallery.newGallery');
	}

	public function saveGallery(){
		$id 	=	base64_decode(Input::get('id'));

		$validator	=	array(
					'title'	=>	'required',
					'date'	=>	'required');
		if(strlen($id)<1){ $validator['coverImage'] 	=	'required';}
		$validator	=	Validator::make(Input::all(),$validator);
		if($validator->fails()){
		return Redirect::route('new_gallery')->withErrors($validator->messages());
		}
		else{
			if(strlen($id)>0){
				$galleryAlbum 	=	GalleryAlbum::find($id);

				$galleryAlbum->title 	=	Input::get('title');
				$galleryAlbum->date 	=	Input::get('date');

			    	$album = GalleryAlbum::find($id);
			    	$currentImage	=	$album->cover_image;
			    	$currentFolder = 	$album->folder;

			    	if(Input::file('images')){
				            $file = Input::file('images'); 
				            $destinationPath = $currentFolder;
				            $extension =$file->getClientOriginalExtension(); 
				            $imageFilename = str_random(12).".".$extension;
				            $uploadSuccess = Input::file('images')->move($destinationPath, $imageFilename);
				}

				if(isset($uploadSuccess)){
				    	$galleryAlbum->cover_image 	=	str_replace("\\", '/', $uploadSuccess);
				    	@unlink($currentImage);
				}

				$galleryAlbum->save();
			    	$msg = 'Album updated successfully !';
			    	Session::flash('success-message', $msg);
				return Redirect::route('gallery_management');
			}
			else{
				$galleryAlbum 	=	new GalleryAlbum;

				$galleryAlbum->title 	=	Input::get('title');
				$galleryAlbum->date 	=	Input::get('date');
				if(Input::file('coverImage')):		
					$path ='files/gallery/' . Input::get('title'). str_random(12);
					$folder 	=	@File::makeDirectory($path, 0775, true);
					if($folder){
						$file = Input::file('coverImage'); 
						$destinationPath = $path;
						$extension =$file->getClientOriginalExtension(); 
						$imageFilename = str_random(12).".".$extension;
						$uploadSuccess = Input::file('coverImage')->move($destinationPath, $imageFilename);
						
						if(isset($uploadSuccess)){
			    				$galleryAlbum->cover_image 	=	str_replace("\\", '/', $uploadSuccess);
			    			}
						$galleryAlbum->folder = 	$destinationPath;
						$galleryAlbum->save();
						Session::flash('success-message', 'New album created successfully'); 
						return Redirect::route('gallery_management');
					}
					else {
						Session::flash('warning-message','Please check you provided folder creation permission in files folder !!!');
						return Redirect::route('gallery_new')->withInput();
					}
				else:
					Session::flash('warning-message','Please add cover image !!!');
					return Redirect::route('gallery_new')->withInput();
				endif;
			}
			
		}
	}

	public function editGallery(){
		Session::flash('pageSubCat', 'galleryManagement');

		(strlen(Input::get('id'))>0) ? $id = Input::get('id') : $id =	 Session::get('id'); 		

		$data['album']	=	GalleryAlbum::where('id',$id)->first();

		$data['albumImages']	=	GalleryImage::where('album_id',$id)->get();
		
		$this->layout->content = View::make('dashboard.gallery.editAlbum',$data);
	}

	public function saveAlbumImages(){
		$validator	=	array( 'images'	=>	'required');
		$validator	=	Validator::make(Input::all(),$validator);
		if($validator->fails()){
			return Redirect::route('gallery_management')->withErrors($validator->messages());
		}
		else{
			$files = Input::file('images');
			$file_count = count($files);
			
			
			$path =	'files/gallery';
			
			$uploadedArray = array();
			$uploadcount = 0;
			foreach($files as $file) {
				$rules = array('file' => 'required'); 
				$validator = Validator::make(array('file'=> $file), $rules);
				
				if($validator->passes()){
					$destinationPath = $path;
					$filename = str_random(12).'_'.$file->getClientOriginalName();
					$upload_success = $file->move($destinationPath, $filename);
					$uploadedArray[$uploadcount] = $upload_success;
					$uploadcount ++;
				}
			}
					
			if($uploadcount == $file_count){
				for($i = 0; $i<$file_count; $i++){
					$image =  new GalleryImage;
					$image->image 	=	$uploadedArray[$i];

					$image->save();
				}

				Session::flash('success-message', 'Images added successfully'); 
				return Redirect::route('gallery_management');
			} 
			else {
				 return Redirect::route('gallery_management')->withInput()->withErrors($validator);
			}
		}
	}

	public function deleteAlbumImage(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('gallery_management')->withErrors($validator->messages());
		}
		else{
			$image 		= 	GalleryImage::find($id);
			$currentImage	=	$image->image;

			GalleryImage::where('id','=',$id)->delete();
			@unlink($currentImage);
			
			$msg = "Image deleted successfully !";
			Session::put('id',Input::get('albumId')); 		
			Session::flash('success-message', $msg);
			return Redirect::route('gallery_management');
		}
	}

	public function deleteGallery(){
		$id 		=	Input::get('id');
		$validator 	=	Validator::make(Input::all(),array('id'	=>	'required'));
		
		if($validator->fails()){
			return Redirect::route('gallery_management')->withErrors($validator->messages());
		}
		else{
			$galleryImages = GalleryImage::where('album_id','=',$id)->get();
			foreach($galleryImages as $row):
				@unlink($row->image);
				GalleryImage::where('id','=',$row->id)->delete();
			endforeach;

			$folder = GalleryAlbum::where('id','=',$id)->first();
			@unlink($row->cover_image);
			@File::deleteDirectory($folder->folder);
			GalleryAlbum::where('id','=',$id)->delete();

			$msg = "Album deleted successfully !";
			Session::flash('success-message', $msg);
			return Redirect::route('gallery_management');
		}
	}
}