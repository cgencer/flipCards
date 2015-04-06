<?php
    $sections = array(
        array(
            'id' => 'wedevs_basics',
            'title' => __( 'Basic Settings', 'wedevs' )
        ),
        array(
            'id' => 'wedevs_advanced',
            'title' => __( 'Advanced Settings', 'wedevs' )
        ),
        array(
            'id' => 'wedevs_others',
            'title' => __( 'Other Settings', 'wpuf' )
        )
    );

    $fields = array(
        'wedevs_basics' => array(
            array(
                'name' => 'text',
                'label' => __( 'Text Input', 'wedevs' ),
                'desc' => __( 'Text input description', 'wedevs' ),
                'type' => 'text',
                'default' => 'Title'
            ),
            array(
                'name' => 'textarea',
                'label' => __( 'Textarea Input', 'wedevs' ),
                'desc' => __( 'Textarea description', 'wedevs' ),
                'type' => 'textarea'
            ),
            array(
                'name' => 'checkbox',
                'label' => __( 'Checkbox', 'wedevs' ),
                'desc' => __( 'Checkbox Label', 'wedevs' ),
                'type' => 'checkbox'
            ),
            array(
                'name' => 'radio',
                'label' => __( 'Radio Button', 'wedevs' ),
                'desc' => __( 'A radio button', 'wedevs' ),
                'type' => 'radio',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
            ),
            array(
                'name' => 'multicheck',
                'label' => __( 'Multile checkbox', 'wedevs' ),
                'desc' => __( 'Multi checkbox description', 'wedevs' ),
                'type' => 'multicheck',
                'options' => array(
                    'one' => 'One',
                    'two' => 'Two',
                    'three' => 'Three',
                    'four' => 'Four'
                )
            ),
            array(
                'name' => 'selectbox',
                'label' => __( 'A Dropdown', 'wedevs' ),
                'desc' => __( 'Dropdown description', 'wedevs' ),
                'type' => 'select',
                'default' => 'no',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
            )
        ),
        'wedevs_advanced' => array(
            array(
                'name' => 'text',
                'label' => __( 'Text Input', 'wedevs' ),
                'desc' => __( 'Text input description', 'wedevs' ),
                'type' => 'text',
                'default' => 'Title'
            ),
            array(
                'name' => 'textarea',
                'label' => __( 'Textarea Input', 'wedevs' ),
                'desc' => __( 'Textarea description', 'wedevs' ),
                'type' => 'textarea'
            ),
            array(
                'name' => 'checkbox',
                'label' => __( 'Checkbox', 'wedevs' ),
                'desc' => __( 'Checkbox Label', 'wedevs' ),
                'type' => 'checkbox'
            ),
            array(
                'name' => 'radio',
                'label' => __( 'Radio Button', 'wedevs' ),
                'desc' => __( 'A radio button', 'wedevs' ),
                'type' => 'radio',
                'default' => 'no',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
            ),
            array(
                'name' => 'multicheck',
                'label' => __( 'Multile checkbox', 'wedevs' ),
                'desc' => __( 'Multi checkbox description', 'wedevs' ),
                'type' => 'multicheck',
                'default' => array('one' => 'one', 'four' => 'four'),
                'options' => array(
                    'one' => 'One',
                    'two' => 'Two',
                    'three' => 'Three',
                    'four' => 'Four'
                )
            ),
            array(
                'name' => 'selectbox',
                'label' => __( 'A Dropdown', 'wedevs' ),
                'desc' => __( 'Dropdown description', 'wedevs' ),
                'type' => 'select',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
            )
        ),
        'wedevs_others' => array(
            array(
                'name' => 'text',
                'label' => __( 'Text Input', 'wedevs' ),
                'desc' => __( 'Text input description', 'wedevs' ),
                'type' => 'text',
                'default' => 'Title'
            ),
            array(
                'name' => 'textarea',
                'label' => __( 'Textarea Input', 'wedevs' ),
                'desc' => __( 'Textarea description', 'wedevs' ),
                'type' => 'textarea'
            ),
            array(
                'name' => 'checkbox',
                'label' => __( 'Checkbox', 'wedevs' ),
                'desc' => __( 'Checkbox Label', 'wedevs' ),
                'type' => 'checkbox'
            ),
            array(
                'name' => 'radio',
                'label' => __( 'Radio Button', 'wedevs' ),
                'desc' => __( 'A radio button', 'wedevs' ),
                'type' => 'radio',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
            ),
            array(
                'name' => 'multicheck',
                'label' => __( 'Multile checkbox', 'wedevs' ),
                'desc' => __( 'Multi checkbox description', 'wedevs' ),
                'type' => 'multicheck',
                'options' => array(
                    'one' => 'One',
                    'two' => 'Two',
                    'three' => 'Three',
                    'four' => 'Four'
                )
            ),
            array(
                'name' => 'selectbox',
                'label' => __( 'A Dropdown', 'wedevs' ),
                'desc' => __( 'Dropdown description', 'wedevs' ),
                'type' => 'select',
                'options' => array(
                    'yes' => 'Yes',
                    'no' => 'No'
                )
            )
        )
    );