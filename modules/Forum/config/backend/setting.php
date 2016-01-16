<?php

/* nkForm configuration */

// List of fields to update
$forumSettingField = array(
    'forum_title',
    'forum_desc',
    'forum_rank_team',
    'forum_image',
    'forum_birthday',
    'forum_gamer_details',
    'forum_user_details',
    'forum_labels_active',
    'forum_display_modos',
    'thread_forum_page',
    'mess_forum_page',
    'hot_topic',
    'post_flood',
    'forum_field_max',
    'forum_file',
    'forum_file_level',
    'forum_file_maxsize'
);

// Definition of editing forum setting form
$forumSettingForm = array(
    'id'        => 'editForumSettingForm',
    'action'    => 'index.php?file=Forum&amp;page=admin&amp;op=saveSetting',
    'method'    => 'post',
    'items' => array(
        'forum_title' => array(
            'label'             => _FORUMTITLE,
            'type'              => 'text',
            'name'              => 'forum_title',
            'size'              => 40
        ),
        'forum_desc' => array(
            'label'             => _FORUMDESC,
            'type'              => 'textarea',
            'name'              => 'forum_desc',
            'cols'              => 55,
            'rows'              => 5
        ),
        'forum_rank_team' => array(
            'label'             => _USERANKTEAM,
            'type'              => 'checkbox',
            'name'              => 'forum_rank_team',
            'inputValue'        => 'on'
        ),
        'forum_image' => array(
            'label'             => _DISPLAYFORUMIMAGE,
            'type'              => 'checkbox',
            'name'              => 'forum_image',
            'inputValue'        => 'on'
        ),
        'forum_cat_image' => array(
            'label'             => _DISPLAYCATIMAGE,
            'type'              => 'checkbox',
            'name'              => 'forum_cat_image',
            'inputValue'        => 'on'
        ),
        'forum_birthday' => array(
            'label'             => _DISPLAYBIRTHDAY,
            'type'              => 'checkbox',
            'name'              => 'forum_birthday',
            'inputValue'        => 'on'
        ),
        'forum_gamer_details' => array(
            'label'             => _DISPLAYGAMERDETAILS,
            'type'              => 'checkbox',
            'name'              => 'forum_gamer_details',
            'inputValue'        => 'on'
        ),
        'forum_user_details' => array(
            'label'             => _DISPLAYUSERDETAILS,
            'type'              => 'checkbox',
            'name'              => 'forum_user_details',
            'inputValue'        => 'on'
        ),
        'forum_labels_active' => array(
            'label'             => _DISPLAYLABELS,
            'type'              => 'checkbox',
            'name'              => 'forum_labels_active',
            'inputValue'        => 'on'
        ),
        'forum_display_modos' => array(
            'label'             => _DISPLAYMODOS,
            'type'              => 'checkbox',
            'name'              => 'forum_display_modos',
            'inputValue'        => 'on'
        ),
        'thread_forum_page' => array(
            'label'             => _NUMBERTHREAD,
            'type'              => 'text',
            'name'              => 'thread_forum_page',
            'size'              => 2,
            'dataType'          => 'numeric',
            'required'          => true,
            'noempty'           => true
        ),
        'mess_forum_page' => array(
            'label'             => _NUMBERPOST,
            'type'              => 'text',
            'name'              => 'mess_forum_page',
            'size'              => 2,
            'dataType'          => 'numeric',
            'required'          => true,
            'noempty'           => true
        ),
        'hot_topic' => array(
            'label'             => _TOPICHOT,
            'type'              => 'text',
            'name'              => 'hot_topic',
            'size'              => 2,
            'dataType'          => 'numeric',
            'required'          => true,
            'noempty'           => true
        ),
        'post_flood' => array(
            'label'             => _POSTFLOOD,
            'type'              => 'text',
            'name'              => 'post_flood',
            'size'              => 2,
            'dataType'          => 'numeric',
            'required'          => true,
            'noempty'           => true
        ),
        'forum_field_max' => array(
            'label'             => _MAXFIELD,
            'type'              => 'text',
            'name'              => 'forum_field_max',
            'size'              => 2,
            'dataType'          => 'numeric',
            'required'          => true,
            'noempty'           => true
        ),
        'forum_file' => array(
            'label'             => _ATTACHFILES,
            'type'              => 'checkbox',
            'name'              => 'forum_file',
            'inputValue'        => 'on'
        ),
        'forum_file_level' => array(
            'label'             => _FILELEVEL,
            'type'              => 'select',
            'name'              => 'forum_file_level',
            'options'           => array(
                0 => 0,
                1 => 1,
                2 => 2,
                3 => 3,
                4 => 4,
                5 => 5,
                6 => 6,
                7 => 7,
                8 => 8,
                9 => 9
            )
        ),
        'forum_file_maxsize' => array(
            'label'             => _MAXFIELD,
            'type'              => 'text',
            'name'              => 'forum_file_maxsize',
            'size'              => 6,
            'dataType'          => 'numeric',
            'required'          => true,
            'noempty'           => true
        )
    ),
    'itemsFooter' => array(
        'submit' => array(
            'type'              => 'submit',
            'name'              => 'submit',
            'value'             => __('SEND'),
            'inputClass'        => array('button')
        ),
        'backlink' => array(
            'html'              => '<a class="buttonLink" href="index.php?file=Forum&amp;page=admin">'. __('BACK') .'</a>'
        )
    )
);

?>