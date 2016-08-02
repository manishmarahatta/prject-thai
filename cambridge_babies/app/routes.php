<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as'=>'home', 'uses'=>'HomeController@index'));
Route::get('our-team', array('as'=>'our-team', 'uses'=>'HomeController@ourTeam'));

Route::get('activities/{id}/{title}', array('uses'=>'HomeController@activities'));
Route::get('trekking/{id}/{title}', array('uses'=>'HomeController@trekking'));
Route::get('blog', array('as'=>'blog', 'uses'=>'HomeController@blog'));
Route::get('blog/view/{id}/{title}', array('as'=>'blog_view', 'uses'=>'HomeController@blogView'));
Route::get('blog/archive/{date}', array('uses'=>'HomeController@blogArchives' ));

Route::get('page/view/{id}/{title}', array('uses'=>'HomeController@pageView'));

Route::get('news', array('as'=>'news', 'uses'=>'HomeController@news'));
Route::get('news/page/{page}', array('as'=>'newsPages', 'uses'=>'HomeController@newsPage'));
Route::get('news/view/{id}/{title}', array('uses'=>'HomeController@newsView' ));
Route::get('news/archive/{date}', array('uses'=>'HomeController@newsArchives' ));


Route::get('gallery', array('as'=>'gallery', 'uses'=>'HomeController@gallery'));
Route::get('faq', array('as'=>'faq', 'uses'=>'HomeController@faq'));

Route::get('contact-us', array('as'=>'contact', 'uses'=>'HomeController@contact'));

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::get('/_cpanel', array('as'=>'login','uses'=>'LoginController@showLogin'));
Route::get('/login', array('uses'=>'LoginController@showLogin'));

Route::group(array('before' => 'csrf'), function(){
	Route::post('/_cpanel',array('uses'=>'LoginController@doLogin'));
});


Route::group(array('before' => 'auth'), function(){

	Route::get('/dashboard',array('as'=>'dashboard','uses'=>'DashboardController@index'));
	Route::get('/dashboard/logout',array('as'=>'logout','uses'=>'DashboardController@logout'));

	
	/*|--------------------------------------------------------------------------
	   | Page Management Routes
	   |--------------------------------------------------------------------------*/
	Route::group(array('prefix' => 'dashboard/page_management'), function(){
		Route::get('pages', array('as'=>'page_management', 'uses'=>'PageManagementController@index'));
		Route::get('subpages', array('as'=>'subpage_management', 'uses'=>'PageManagementController@subpage'));
		Route::get('new_subpage', array('as'=>'new_subpage', 'uses'=>'PageManagementController@newSubpage'));

		Route::group(array('before'=>'csrf'),function(){
			Route::post('edit_page', array('uses'=>'PageManagementController@editPage'));
			Route::post('edit_subpage', array('uses'=>'PageManagementController@editSubpage'));

			Route::post('save_page', array('as'=>'save_page', 'uses'=>'PageManagementController@savePage'));
			Route::post('save_subpage', array('as'=>'save_subpage', 'uses'=>'PageManagementController@saveSubpage'));

			Route::post('delete_subpage', array('uses'=>'PageManagementController@deleteSubpage'));
		});
	});
	
	/*|--------------------------------------------------------------------------
	   | Sliders Management Routes
	   |--------------------------------------------------------------------------*/
	Route::group(array('prefix'=>'dashboard/slider_management'), function(){
		Route::get('sliders', array('as'=>'slider_management', 'uses'=>'SliderManagementController@index'));
		Route::get('new_slider', array('as'=>'new_slider', 'uses'=>'SliderManagementController@newSlider'));

		Route::group(array('before'=>'csrf'), function(){
			Route::post('save_slider', array('as'=>'save_slider', 'uses'=>'SliderManagementController@saveSlider'));
			Route::post('edit_slider', array('uses'=>'SliderManagementController@editSlider'));
			Route::post('delete_slider', array('uses'=>'SliderManagementController@deleteSlider'));
		});
	});

	Route::group(array('prefix'=>'dashboard/blog_management'), function(){
		Route::get('/', array('as'=>'blog_management', 'uses'=>'BlogManagementController@index'));
		Route::get('new_blog_post', array('as'=>'new_blog_post', 'uses'=>'BlogManagementController@newPost'));

		Route::group(array('before'=>'csrf'), function(){
			Route::post('save_blog_article', array('as'=>'save_blog_article', 'uses'=>'BlogManagementController@savePost'));
			Route::post('delete', array('uses'=>'BlogManagementController@deletePost'));
			Route::post('edit', array('uses'=>'BlogManagementController@editPost'));
		});
	});

	Route::group(array('prefix'=>'dashboard/newsupdates_management'), function(){
		Route::get('/', array('as'=>'newsupdate_management', 'uses'=>'NewsUpdatesManagementController@index'));
		Route::get('new_newsupdates', array('as'=>'new_newsupdates', 'uses'=>'NewsUpdatesManagementController@new_newsupdates'));
		Route::group(array('before'=>'csrf'), function(){
			Route::post('save_newsupdates', array('as'=>'save_newsupdates', 'uses'=>'NewsUpdatesManagementController@save_newsupdates'));
			Route::post('edit', array('uses'=>'NewsUpdatesManagementController@editPost'));
			Route::post('delete', array('uses'=>'NewsUpdatesManagementController@deletePost'));
		});
	});


	/*|--------------------------------------------------------------------------
	   | Profile Management Routes
	   |--------------------------------------------------------------------------*/
	Route::group(array('prefix' => 'dashboard/profile_mgmt'), function(){
		Route::get('profile', array('as'=>'profile_mgmt', 'uses'=>'DashboardController@profileMgmt'));

		Route::group(array('before'=>'csrf'), function(){
			Route::post('update_password', array('as'=>'update_password', 'uses'=>'DashboardController@updatePassword'));
			Route::post('update_profile', array('as'=>'update_profile', 'uses'=>'DashboardController@updateProfile'));
		});
	});

	Route::group(array('prefix'=>'dashboard/trekking_management'), function(){
		Route::get('/', array('as'=>'trekking_management', 'uses'=>'TrekkingManagementController@index'));

		Route::group(array('prefix'=>'activities_type_management'), function(){
			Route::get('/', array('as'=>'activities_type_management', 'uses'=>'TrekkingManagementController@activities'));
			Route::get('new_activities', array('as'=>'new_activities','uses'=>'TrekkingManagementController@newActivities'));

			Route::group(array('before'=>'csrf'), function(){
				Route::post('save_activities_type', array('as'=>'save_activities_type', 'uses'=>'TrekkingManagementController@saveActivitiesType'));
				Route::post('edit', array('uses'=>'TrekkingManagementController@editActivitiesType'));
				Route::post('delete', array('uses'=>'TrekkingManagementController@deleteActivitiesType'));
			});
		});

		Route::group(array('prefix'=>'trekking'), function(){
			Route::get('/', array('as'=>'trekking', 'uses'=>'TrekkingManagementController@trekking'));
			Route::get('new', array('as'=>'new_trekking','uses'=>'TrekkingManagementController@newTrekking'));
			Route::get('edit_trekking', array('as'=>'edit_trekking','uses'=>'TrekkingManagementController@editTrekking'));
			
			Route::group(array('before'=>'csrf'), function(){
				Route::post('save', array('as'=>'save_trekking', 'uses'=>'TrekkingManagementController@saveTrekking'));
				Route::post('edit', array('uses'=>'TrekkingManagementController@editTrekking'));
				Route::post('delete', array('uses'=>'TrekkingManagementController@deleteTrekking'));

				Route::post('save_trekking_slider', array('as'=>'save_trekking_slider','uses'=>'TrekkingManagementController@saveTrekkingSlider'));
				Route::post('slider/delete', array('uses'=>'TrekkingManagementController@deleteTrekkingSlider'));
			});
		});
	});

	/*|--------------------------------------------------------------------------
	   | Gallery management Routes
	   |--------------------------------------------------------------------------*/
	Route::group(array('prefix'=>'dashboard/activities_management'), function(){
		Route::get('gallery', array('as'=>'gallery_management', 'uses'=>'GalleryManagementController@index'));
		Route::get('new_gallery', array('as'=>'new_gallery', 'uses'=>'GalleryManagementController@newGallery'));
		Route::get('edit_gallery', array('as'=>'edit_gallery','uses'=>'GalleryManagementController@editGallery'));

		Route::group(array('before'=>'csrf'), function(){
			Route::post('save_gallery', array('as'=>'save_gallery','uses'=>'GalleryManagementController@saveGallery'));
			Route::post('edit_gallery', array('as'=>'edit_gallery','uses'=>'GalleryManagementController@editGallery'));
			Route::post('save_album_images', array('as'=>'save_album_images', 'uses'=>'GalleryManagementController@saveAlbumImages'));
			Route::post('delete_gallery_image', array('uses'=>'GalleryManagementController@deleteAlbumImage'));
			Route::post('delete_gallery', array('uses'=>'GalleryManagementController@deleteGallery'));
		});
	});

	/*|--------------------------------------------------------------------------
	   | Staff Management Routes
	   |--------------------------------------------------------------------------*/
	Route::group(array('prefix'=>'dashboard/staff'), function(){
		Route::get('/', array('as'=>'staff_profile', 'uses'=>'StaffProfileManagementController@index'));
		Route::get('new_profile', array('as'=>'new_profile', 'uses'=>'StaffProfileManagementController@newProfile'));

		Route::group(array('before'=>'csrf'), function(){
			Route::post('save_staff', array('as'=>'save_staff', 'uses'=>'StaffProfileManagementController@saveProfile'));
			Route::post('edit_profile', array('uses'=>'StaffProfileManagementController@editProfile'));
			Route::post('delete_profile',array('uses'=>'StaffProfileManagementController@deleteProfile'));
		});
	});


	/*|--------------------------------------------------------------------------
	   | Testimonials management Routes
	   |--------------------------------------------------------------------------*/
	Route::group(array('prefix'=>'dashboard/testimonials_management'), function(){
	   	Route::get('testimonials', array('as'=>'testimonials_management', 'uses'=>'TestimonialsManagementController@index'));
	   	Route::get('new_testimonials', array('as'=>'new_testimonials', 'uses'=>'TestimonialsManagementController@newTestimonials'));

	   	Route::group(array('before'=>'csrf'), function(){
	   		Route::post('save_testimonials', array('as'=>'save_testimonials', 'uses'=>'TestimonialsManagementController@saveTestimonials'));
	   		Route::post('edit_testimonials', array('uses'=>'TestimonialsManagementController@editTestimonials'));
	   		Route::post('delete_testimonials', array('uses'=>'TestimonialsManagementController@deleteTestimonials'));
	   	});
	});

	Route::group(array('prefix'=>'dashboard/faq_management'), function(){
		Route::get('/', array('as'=>'faq_management', 'uses'=>'FaqManagement@index'));
		Route::get('new_faq', array('as'=>'new_faq', 'uses'=>'FaqManagement@newFaq'));

		Route::group(array('before'=>'csrf'), function(){
			Route::post('save_faq', array('as'=>'save_faq', 'uses'=>'FaqManagement@saveFaq'));
			Route::post('edit_faq', array('uses'=>'FaqManagement@editFaq'));
			Route::post('delete_faq', array('uses'=>'FaqManagement@deleteFaq'));
		});
	});	

	/*|--------------------------------------------------------------------------
	   | Contact Details management Routes
	   |--------------------------------------------------------------------------*/
	Route::get('contactDetails', array('as'=>'contactDetails', 'uses'=>'ContactDetailsController@index'));
	Route::group(array('before'=>'csrf'), function(){
		Route::post('update_contact', array('as'=>'update_contact', 'uses'=>'ContactDetailsController@updateContact'));
	});
});