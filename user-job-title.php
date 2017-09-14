<?php
/*
Plugin Name: User Job Title
Plugin Group: User Profile
Author: Eric King
Author URI: http://webdeveric.com/
Description: Add a job title field to the user profile.
Version: 1.0.0
*/

namespace LonelyPlanet\UserJobTitle;

include 'functions.php';

\add_action( 'show_user_profile', __NAMESPACE__ . '\jobTitleAuthorField', 10, 1 );
\add_action( 'edit_user_profile', __NAMESPACE__ . '\jobTitleAuthorField', 10, 1 );
\add_action( 'personal_options_update', __NAMESPACE__ . '\saveAuthorFields', 10, 1 );
\add_action( 'edit_user_profile_update', __NAMESPACE__ . '\saveAuthorFields', 10, 1 );
