<?php
function upload_image($img_field_name, $old_img_field_name = '', $target_dir = './images/upload/')
{
    if (!empty($_FILES[$img_field_name]['name'])) {
        $ext = strtolower(end(explode('.', $_FILES[$img_field_name]['name'])));
        $image_name = rand(10000, 990000) . '_' . time() . '.' . $ext;
        move_uploaded_file($_FILES[$img_field_name]['tmp_name'], $target_dir . $image_name);
        return $image_name;
    } elseif ($old_img_field_name != '') {
        return $_POST[$old_img_field_name];
    }
}
