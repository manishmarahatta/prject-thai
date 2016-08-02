<?php
class HomeController extends BaseController {
	protected $layout = 'layouts.website.master';

	public function getHeader(){
		$data['contactDtl'] 			=	Contacts::first();
		$data['pagesNav'] 		=	Pages::with('subpages')->get();
		$data['activitiesNav']		=	Activities::orderBy('title','asc')->get();
		$data['trakkingNav'] 		=	Trekking::orderBy('title','asc')->get();
		$this->layout->header 	=	View::make('website.include.header',$data);
	}

	public function getPageNavTitle($id){
		return Pages::select('title')->where('id',$id)->first();
	}

	public function pageView($id, $title){

		$this->getHeader();
		$data['pageId']				=	$id;
		$data['pageDetails'] 		=	Subpages::where('id',$id)->first();
		$data['subPages']			=	Subpages::where('pageId',$data['pageDetails']->pageId)->orderBy('id','asc')->get();
		$this->layout->content 	=	View::make('website.pageView',$data);
	}

	public function index(){
		Session::flash('page','home');
		$data['slider']				=	Sliders::orderBy('id','desc')->get();
		$data['testimonials']		=	Testimonials::orderBy('id','desc')->get();

		$this->getHeader();
		$this->layout->content 	=	View::make('website.index',$data);
	}

	public function activities($id,$title){

		$act = Activities::get();
		dd($act->first()->trekking->first()->sliders);

		$this->getHeader();

		$data['result'] 		=	Activities::with('trekking')->where('id','=',$id)->orderBy('title')->first();
		// echo"<pre>";
		// var_dump($data['result']);
		// echo"</pre>";
		// die;
		$this->layout->content 	=	View::make('website.activities.list',$data);
	}

	public function trekking($id, $title){
		$this->getHeader();
		
		$data['result']				=	Trekking::where('id','=',$id)->first();
		$this->layout->content 	=	View::make('website.trekking.index',$data);
	}

	public function ourTeam(){
		Session::flash('page',$this->getPageNavTitle(3)->title);
		$data['ourTeams']			=	Staffs::orderBy('id','asc')->get();
		$data['rightNav']			=	Subpages::where('pageId',3)->orderBy('id','asc')->get();

		$this->getHeader();
		$this->layout->content 	=	View::make('website.ourTeam.index',$data);
	}

	public function blog(){
		Session::flash('page','blog');
		$data['articles']				=	Blog::orderBy('date','desc')->take(5)->get();
		$data['recentArticles']				=	Blog::orderBy('date','desc')->take(6)->get();
		$data['archive']			=	Blog::distinct()->select('archives')->orderBy('archives','desc')->groupBy('archives')->get();
		
		$this->getHeader();
		$this->layout->content 	=	View::make('website.blog.index',$data);
	}

	public function blogView($id,$title){
		Session::flash('page','blog');
		$data['article']				=	Blog::where('id',$id)->first();
		$data['recentArticles']				=	Blog::orderBy('date','desc')->take(6)->get();
		$data['archive']			=	Blog::distinct()->select('archives')->orderBy('archives','desc')->groupBy('archives')->get();
	
		$this->getHeader();
		$this->layout->content 	=	View::make('website.blog.view',$data);
	}

	public function blogArchives($date){
		Session::flash('page','blog');
		$data['articles']				=	Blog::where('archives',$date)->orderBy('date','desc')->take(5)->get();
		$data['recentArticles']				=	Blog::orderBy('date','desc')->take(6)->get();
		$data['archive']			=	Blog::distinct()->select('archives')->orderBy('archives','desc')->groupBy('archives')->get();

		$this->getHeader();
		$this->layout->content 	=	View::make('website.blog.index',$data);
	}

	public function news(){
		Session::flash('page','news');
		$data['articles']			=	NewsUpdates::orderBy('date','desc')->take(5)->get();
		$data['recentArticles']		=	NewsUpdates::orderBy('date','desc')->take(6)->get();
		$data['archive']			=	NewsUpdates::distinct()->select('archives')->orderBy('archives','desc')->groupBy('archives')->get();

		if(NewsUpdates::count()%5==0):
			$data['totalRecord'] 	=	NewsUpdates::count()/5;
		else:
			$data['totalRecord'] 	=	intval(NewsUpdates::count()/5)+1;
		endif;

		$this->getHeader();
		$this->layout->content 	=	View::make('website.news.index',$data);
	}

	public function newsPage($page){
		Session::flash('page','news');
		$data['pageId']				=	$page;
		$data['articles']			=	NewsUpdates::orderBy('date','desc')->skip((5*($page-1)))->take(5)->get();
		
		$data['recentArticles']		=	NewsUpdates::orderBy('date','desc')->take(6)->get();
		$data['archive']			=	NewsUpdates::distinct()->select('archives')->orderBy('archives','desc')->groupBy('archives')->get();

		if(NewsUpdates::count()%5==0):
			$data['totalRecord'] 	=	NewsUpdates::count()/5;
		else:
			$data['totalRecord'] 	=	intval(NewsUpdates::count()/5)+1;
		endif;

		$this->getHeader();
		$this->layout->content 	=	View::make('website.news.page',$data);
	}

	public function newsView($id,$title){
		Session::flash('page','news');
		$data['article']				=	NewsUpdates::where('id',$id)->first();
		$data['recentArticles']				=	NewsUpdates::orderBy('date','desc')->take(6)->get();
		$data['archive']			=	NewsUpdates::distinct()->select('archives')->orderBy('archives','desc')->groupBy('archives')->get();
		
		$this->getHeader();
		$this->layout->content 	=	View::make('website.news.view',$data);
	}

	public function newsArchives($date){
		Session::flash('page','news');
		$data['articles']				=	NewsUpdates::where('archives',$date)->orderBy('date','desc')->take(5)->get();
		$data['recentArticles']				=	NewsUpdates::orderBy('date','desc')->take(6)->get();
		$data['archive']			=	NewsUpdates::distinct()->select('archives')->orderBy('archives','desc')->groupBy('archives')->get();
		
		$this->getHeader();
		$this->layout->content 	=	View::make('website.news.index',$data);
	}

	public function faq(){
		Session::flash('page','faq');
		$data['faq']					=	Faq::orderBy('id','asc')->get();
		
		$this->getHeader();
		$this->layout->content 	=	View::make('website.faq.index',$data);
	}

	public function gallery(){
		Session::flash('page','gallery');
		$data['images']					=	GalleryImage::orderBy('id','desc')->get();
		
		$this->getHeader();
		$this->layout->content 	=	View::make('website.gallery.index',$data);
	}

	public function contact(){
		$data['contactDtl']			=	Contacts::where('id',1)->first();
		
		$this->getHeader();
		$this->layout->content 	=	View::make('website.contact.index',$data);
	}
}