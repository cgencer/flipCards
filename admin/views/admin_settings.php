<?php
/*
function array2json($arr) {
    $parts = array();
    $is_list = false;

    //Find out if the given array is a numerical array
    $keys = array_keys($arr);
    $max_length = count($arr)-1;
    if(($keys[0] == 0) and ($keys[$max_length] == $max_length)) {//See if the first key is 0 and last key is length - 1
        $is_list = true;
        for($i=0; $i<count($keys); $i++) { //See if each key correspondes to its position
            if($i != $keys[$i]) { //A key fails at position check.
                $is_list = false; //It is an associative array.
                break;
            }
        }
    }

    foreach($arr as $key=>$value) {
        if(is_array($value)) { //Custom handling for arrays
            if($is_list) $parts[] = array2json($value); 
            else $parts[] = '"' . $key . '":' . array2json($value); 
        } else {
            $str = '';
            if(!$is_list) $str = '"' . $key . '":';

            //Custom handling for multiple data types
            if(is_numeric($value)) $str .= $value; //Numbers
            elseif($value === false) $str .= 'false'; //The booleans
            elseif($value === true) $str .= 'true';
            else $str .= '"' . addslashes($value) . '"'; //All other things
            // :TODO: Is there any more datatype we should be in the lookout for? (Object?)

            $parts[] = $str;
        }
    }
    $json = implode(',',$parts);

    if($is_list) return '[' . $json . ']';//Return numerical JSON
    return '{' . $json . '}';//Return associative JSON
} 
*/
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



echo("<hr>".array2json($fields)."<hr>");
