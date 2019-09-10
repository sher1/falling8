<?php

use Drupal\Component\Utility\Html;



use Drupal\Core\Form\FormStateInterface;



use Drupal\system\Form\ThemeSettingsForm;



use Drupal\file\Entity\File;



use Drupal\Core\Url;



function revoo_form_system_theme_settings_alter(&$form, \Drupal\Core\Form\FormStateInterface $form_state) {

    $form['settings'] = array(

      	'#type' => 'details',

      	'#title' => t('Theme settings'),

       	'#open' => TRUE,

    );

    

  	$form['settings']['general_setting'] = array(

      	'#type' => 'details',

      	'#title' => t('General Settings'),

      	'#open' => FALSE,

  	);



  	$form['settings']['general_setting']['general_setting_tracking_code'] = array(

      	'#type' => 'textarea',

      	'#title' => t('Tracking Code'),

      	'#default_value' => theme_get_setting('general_setting_tracking_code', 'revoo'),

  	);

  	

  	// custom css

	$form['settings']['custom_css'] = array(

		'#type' => 'details',

		'#title' => t('Custom CSS'),

		'#open' => FALSE,

	);

  



	$form['settings']['custom_css']['custom_css'] = array(

		'#type' => 'textarea',

		'#title' => t('Custom CSS'),

		'#default_value' => theme_get_setting('custom_css', 'revoo'),

		'#description'  => t('<strong>Example:</strong><br/>h1 { font-family: \'Metrophobic\', Arial, serif; font-weight: 400; }')

	); 

  $form['settings']['header'] = array(



        '#type' => 'details',



        '#title' => t('Image background'),



        '#open' => TRUE,



  );

  ////////blog

  $form['settings']['header']['image_background_blog'] = array(



        '#type' => 'details',



        '#title' => t('Image background Blog'),



        '#open' => FALSE,



    );

    $form['settings']['header']['image_background_blog']['imgbkg_blog_file'] = array(



        '#type' => 'textfield',



        '#title' => t('URL of the background image'),



        '#default_value' => theme_get_setting('image_blog_file'),



        '#description' => t('Enter a URL image.'),



        '#size' => 40,



        '#maxlength' => 512,



    );



    $form['settings']['header']['image_background_blog']['imgbkg_blog'] = array(



        '#type' => 'file',



        '#title' => t('Upload image'),



        '#size' => 40,



        '#attributes' => array('enctype' => 'multipart/form-data'),



        '#description' => t('If you don\'t jave direct access to the server, use this field to upload your logo image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),



        '#element_validate' => array('revoo_background_image_validate'),



    );  

//////portfolio

    $form['settings']['header']['image_background_portfolio'] = array(



        '#type' => 'details',



        '#title' => t('Image background Portfolio'),



        '#open' => FALSE,



    );

    $form['settings']['header']['image_background_portfolio']['imgbkg_portfolio_file'] = array(



        '#type' => 'textfield',



        '#title' => t('URL of the background image'),



        '#default_value' => theme_get_setting('image_portfolio_file'),



        '#description' => t('Enter a URL image.'),



        '#size' => 40,



        '#maxlength' => 512,



    );



    $form['settings']['header']['image_background_portfolio']['imgbkg_portfolio'] = array(



        '#type' => 'file',



        '#title' => t('Upload image'),



        '#size' => 40,



        '#attributes' => array('enctype' => 'multipart/form-data'),



        '#description' => t('If you don\'t jave direct access to the server, use this field to upload your logo image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),



        '#element_validate' => array('revoo_background_image_validate'),



    );  

///////page

    $form['settings']['header']['image_background_page'] = array(



        '#type' => 'details',



        '#title' => t('Image background Page'),



        '#open' => FALSE,



    );

    $form['settings']['header']['image_background_page']['imgbkg_page_file'] = array(



        '#type' => 'textfield',



        '#title' => t('URL of the background image'),



        '#default_value' => theme_get_setting('image_page_file'),



        '#description' => t('Enter a URL image.'),



        '#size' => 40,



        '#maxlength' => 512,



    );



    $form['settings']['header']['image_background_page']['imgbkg_page'] = array(



        '#type' => 'file',



        '#title' => t('Upload image'),



        '#size' => 40,



        '#attributes' => array('enctype' => 'multipart/form-data'),



        '#description' => t('If you don\'t jave direct access to the server, use this field to upload your logo image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),



        '#element_validate' => array('revoo_background_image_validate'),



    ); 
//////Logo
    $form['settings']['header_logo'] = array(



        '#type' => 'details',



        '#title' => t('Logo'),



        '#open' => TRUE,



  );
    $form['settings']['header_logo']['style'] = array(
        '#type' => 'select',
        '#title' => t('Default style'),
        '#options' => array(
            'image' => t('Logo Image'),
            'text' => t('Logo Text'),
            
        ),
        '#default_value' => theme_get_setting('style', 'revoo'),
    );
    $form['settings']['header_logo']['image_logo'] = array(



        '#type' => 'details',



        '#title' => t('Image Logo'),



        '#open' => FALSE,



    );

    $form['settings']['header_logo']['image_logo']['image_logo_file'] = array(



        '#type' => 'textfield',



        '#title' => t('URL of the logo image'),



        '#default_value' => theme_get_setting('logo_file'),



        '#description' => t('Enter a URL image.'),



        '#size' => 40,



        '#maxlength' => 512,



    );



    $form['settings']['header_logo']['image_logo']['img_logo'] = array(



        '#type' => 'file',



        '#title' => t('Upload image'),



        '#size' => 40,



        '#attributes' => array('enctype' => 'multipart/form-data'),



        '#description' => t('If you don\'t jave direct access to the server, use this field to upload your logo image. Uploads limited to .png .gif .jpg .jpeg .apng .svg extensions'),



        '#element_validate' => array('revoo_background_image_validate'),



    ); 
    //////logo text
    $form['settings']['header_logo']['logo_text'] = array(
        '#type' => 'textarea',
        '#title' => t('Logo text'),
        '#default_value' => theme_get_setting('logo_text', 'revoo'),
    );


}

function revoo_background_image_validate($element, FormStateInterface $form_state) {



    global $base_url;







    $validators = array('file_validate_extensions' => array('png gif jpg jpeg apng svg'));



    $file = file_save_upload('imgbkg_blog', $validators, "public://", NULL, FILE_EXISTS_REPLACE);

    $file2 = file_save_upload('imgbkg_portfolio', $validators, "public://", NULL, FILE_EXISTS_REPLACE);

    $file3 = file_save_upload('imgbkg_page', $validators, "public://", NULL, FILE_EXISTS_REPLACE);

    $file4 = file_save_upload('img_logo', $validators, "public://", NULL, FILE_EXISTS_REPLACE);



if (!empty($file)) {



        // change file's status from temporary to permanent and update file database



        if ((is_object($file[0]) == 1)) {



            $file[0]->status = FILE_STATUS_PERMANENT;



            $file[0]->save();



            $uri = $file[0]->getFileUri();



            $file_url = file_create_url($uri);



            $file_url = str_ireplace($base_url, '', $file_url);



            $form_state->setValue('image_blog_file', $file_url);



        }



    }

if (!empty($file2)) {



        // change file's status from temporary to permanent and update file database



        if ((is_object($file2[0]) == 1)) {



            $file2[0]->status = FILE_STATUS_PERMANENT;



            $file2[0]->save();



            $uri = $file2[0]->getFileUri();



            $file_url = file_create_url($uri);



            $file_url = str_ireplace($base_url, '', $file_url);



            $form_state->setValue('image_portfolio_file', $file_url);



        }



    }

if (!empty($file3)) {



        // change file's status from temporary to permanent and update file database



        if ((is_object($file3[0]) == 1)) {



            $file3[0]->status = FILE_STATUS_PERMANENT;



            $file3[0]->save();



            $uri = $file3[0]->getFileUri();



            $file_url = file_create_url($uri);



            $file_url = str_ireplace($base_url, '', $file_url);



            $form_state->setValue('image_page_file', $file_url);



        }



    }
if (!empty($file4)) {



        // change file's status from temporary to permanent and update file database



        if ((is_object($file4[0]) == 1)) {



            $file4[0]->status = FILE_STATUS_PERMANENT;



            $file4[0]->save();



            $uri = $file4[0]->getFileUri();



            $file_url = file_create_url($uri);



            $file_url = str_ireplace($base_url, '', $file_url);



            $form_state->setValue('logo_file', $file_url);



        }



    }


}

?>