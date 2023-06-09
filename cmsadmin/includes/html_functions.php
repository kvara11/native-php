<?php
    
    /**
     * Adds required files for jQuery Duplicator.
     **/
    function addDuplicator ()
    {
        global $required_js, $required_css;
        $required_js[] = 'plugins/duplicator/jquery.duplicator.js';
    }
    
    /**
     * Adds required files for jQuery validation.
     **/
    function addValidation ()
    {
        global $required_js, $required_css;
        $required_css[] = '//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.css';
        $required_js[] = '//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js';
        $required_js[] = '//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js';
        $required_js[] = '//cdnjs.cloudflare.com/ajax/libs/qtip2/2.1.1/jquery.qtip.min.js';
    }
    
    /**
     * Adds required files for Uploadify. This will automatically wrap any file input.
     **/
    function addUploadify ()
    {
        global $required_js, $required_css;
        $required_css[] = 'plugins/uploadify/uploadify.css';
        $required_css[] = 'plugins/uploadifive/uploadifive.css';
        $required_js[] = 'plugins/uploadify/jquery.uploadify.min.js';
        $required_js[] = 'plugins/uploadifive/jquery.uploadifive.min.js';
    }
    
    /**
     * Adds required files for TinyMCE. Use inconjunction with drawTinyMCETextArea.
     **/
    function addTinyMCE ()
    {
        global $required_js;
        $required_js[] = '//cdn.tinymce.com/4/tinymce.min.js';
        $required_js[] = 'helpers/tinymce.js';
    }
    
    /**
     * Adds required files for Autosizing text areas. Use inconjunction with drawAutosizeTextArea.
     **/
    function addAutoSize ()
    {
        global $required_js;
        $required_js[] = 'plugins/autosize/jquery.autosize-min.js';
    }
    
    /**
     * Adds required files for Date Picker. Use inconjunction with drawInputDatepicker.
     **/
    function addDatePicker ()
    {
        global $required_js, $required_css;
        $required_css[] = 'plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css';
        $required_js[] = 'plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js';
        $required_js[] = 'plugins/common/moment.min.js';
        $required_js[] = 'plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js';
    }
    
    /**
     * Adds required files for Password Strength meter on input text.
     * "pwstrength" class should be added to input text to activate.
     **/
    function addPWStrength ()
    {
        global $required_js;
        $required_js[] = 'plugins/pwstrength/pwstrength.js';
    }
    
    /**
     * Adds required files for Sortable Table on lists.
     * "sortable-table" class should be added to the table to activate.
     **/
    function addSortableTable ()
    {
        global $required_js;
        $required_js[] = 'helpers/sortable_table.js';
    }
    
    function drawInputBoxAlternate ($type, $name, $label, $value, $additional_class = '', $note = '', $prepend = '', $append = '')
    {
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
            $value = $_POST[$name];
        
        if ( $type == 'password' )
            $value = '';
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <?php if ($prepend || $append) { ?>
                <div class='input-group'>
                    <?php } ?>
                    <?php if ( $prepend ) { ?>
                        <span class='input-group-addon'><?php echo $prepend; ?></span>
                    <?php } ?>
                    <input class="form-control <?php echo $additional_class; ?>" placeholder=""
                           type="<?php echo $type; ?>" name="<?php echo $name; ?>"
                           value="<?php echo htmlspecialchars (stripslashes ($value)); ?>">
                    <?php if ( $append ) { ?>
                        <span class='input-group-addon'><?php echo $append; ?></span>
                    <?php } ?>
                    <?php if ($prepend || $append) { ?>
                </div>
            <?php } ?>
                <?php
                    if ( !empty($note) ) {
                        ?>
                        <p class="help-block">
                            <small class='text-muted'><?php echo $note; ?></small>
                        </p>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }
    
    function drawInputBox ($type, $name, $label, $value_array, $additional_class = '', $note = '', $prepend = '', $append = '')
    {
        $value = $value_array[$name];
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
            $value = $_POST[$name];
        
        if ( $type == 'password' )
            $value = '';
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <?php if ($prepend || $append) { ?>
                <div class='input-group'>
                    <?php } ?>
                    <?php if ( $prepend ) { ?>
                        <span class='input-group-addon'><?php echo $prepend; ?></span>
                    <?php } ?>
                    <input class="form-control <?php echo $additional_class; ?>" placeholder=""
                           type="<?php echo $type; ?>" name="<?php echo $name; ?>"
                           value="<?php echo htmlspecialchars (stripslashes ($value)); ?>">
                    <?php if ( $append ) { ?>
                        <span class='input-group-addon'><?php echo $append; ?></span>
                    <?php } ?>
                    <?php if ($prepend || $append) { ?>
                </div>
            <?php }
                
                if ( !empty($note) ) {
                    ?>
                    <p class="help-block">
                        <small class='text-muted'><?php echo $note; ?></small>
                    </p>
                    <?php
                }
            ?>
            </div>
        </div>
        <?php
    }
    
    /**
     * Draw a Date Picker field. Use inconjunction with addDatePicker
     *
     * @param string $name
     * @param string $label
     * @param array $value_array array for values
     **/
    function drawInputDatepicker ($name, $label, $value_array, $default = null)
    {
        $value = $value_array[$name];
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
            $value = $_POST[$name];
        
        if ( empty($value) )
            $value = $default;
        
        if ( empty($value) && $default === null )
            $value = $_SERVER['REQUEST_TIME'];
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-3">
                <div class="datepicker input-group" id="datepicker">
                    <input class="form-control" data-format="MM/dd/yyyy" placeholder="Select date"
                           name="<?php echo $name; ?>" type="text"
                           value="<?php echo (!empty($value) ? date ("m/d/Y", $value) : ''); ?>">
                    <span class="input-group-addon">
                                <span data-date-icon="icon-calendar" data-time-icon="icon-time"></span>
                              </span>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Draw a select box
     *
     * @param string $name
     * @param array $options_array options for the select
     * @param string $label
     * @param array $value_array array of values
     * @param string $additional_class
     **/
    function drawSelectAlternate ($name, $options_array, $label, $value, $additional_class = '')
    {
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
            $value = $_POST[$name];
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <select class="form-control <?php echo $additional_class; ?>" name="<?php echo $name; ?>">
                    <?php
                        foreach ( $options_array as $option_value => $option_label ) {
                            if ( is_array ($option_label) ) {
                                $option_value = $option_label['value'];
                                $option_label = $option_label['label'];
                            }
                            ?>
                            <option value="<?php echo $option_value; ?>"<?php echo ($option_value == $value ? ' selected="selected"' : ''); ?>><?php echo $option_label; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <?php
    }
    
    
    /**
     * Draw a select box
     *
     * @param string $name
     * @param array $options_array options for the select
     * @param string $label
     * @param array $value_array array of values
     * @param string $additional_class
     **/
    function drawSelect ($name, $options_array, $label, $value_array, $additional_class = '')
    {
        $value = $value_array[$name];
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
            $value = $_POST[$name];
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <select class="form-control <?php echo $additional_class; ?>" name="<?php echo $name; ?>">
                    <?php
                        foreach ( $options_array as $option_value => $option_label ) {
                            if ( is_array ($option_label) ) {
                                $option_value = $option_label['value'];
                                $option_label = $option_label['label'];
                            }
                            ?>
                            <option value="<?php echo $option_value; ?>"<?php echo ($option_value == $value ? ' selected="selected"' : ''); ?>><?php echo $option_label; ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
        </div>
        <?php
    }
    
    /**
     * Draw a textarea
     *
     * @param string $name
     * @param string $label
     * @param array $value_array array of values
     * @param string $additional_class
     **/
    function drawTextArea ($name, $label, $value_array, $additional_class = '', $additional_params = '', $helpers = array ())
    {
        $value = $value_array[$name];
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
            $value = $_POST[$name];
        
        $class = 'form-control ' . $additional_class;
        if ( strpos ($additional_class, 'tinymce') !== false )
            $class = $additional_class;
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <?php if ( !empty($helpers) ) {
                    foreach ( $helpers as $helper ) { ?>
                        <p class="help-block"><?= $helper ?></p>
                    <?php }
                } ?>

                <textarea class="<?php echo $class; ?>"
                          name="<?php echo $name; ?>"<?php echo $additional_params; ?>><?php echo $value; ?></textarea>
            </div>
        </div>
        <?php
    }
    
    function drawAutosizeTextAreaAlternate ($name, $label, $value, $additional_class = '', $additional_params = '')
    {
        $additional_class .= ' autosize';
        drawTextArea ($name, $label, $value, $additional_class, $additional_params);
    }
    
    function drawTextAreaAlternate ($name, $label, $value, $additional_class = '', $additional_params = '')
    {
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
            $value = $_POST[$name];
        
        $class = 'form-control ' . $additional_class;
        if ( strpos ($additional_class, 'tinymce') !== false )
            $class = $additional_class;
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <textarea class="<?php echo $class; ?>"
                          name="<?php echo $name; ?>"<?php echo $additional_params; ?>><?php echo $value; ?></textarea>
            </div>
        </div>
        <?php
    }
    
    function drawAutosizeTextArea ($name, $label, $value_array, $additional_class = '', $additional_params = '')
    {
        $additional_class .= ' autosize';
        drawTextArea ($name, $label, $value_array, $additional_class, $additional_params);
    }


//forced_root_block
    function drawTinyMCETextAreaAlternate ($name, $label, $value, $additional_class = '', $additional_params = '')
    {
        $additional_class .= ' tinymce';
        drawTextAreaAlternate ($name, $label, $value, $additional_class, $additional_params);
    }
    
    /**
     * Draw an image upload field
     *
     * @param string $name
     * @param string $label
     * @param array $value_array array of values
     * @param string $image_folder folder for the image preview
     * @param string $image_size_text helper text to display below the upload field
     * @param string $additional_class
     **/
    function drawImageUploadFieldAlternate ($name, $label, $value, $image_folder, $image_size_text = '', $additional_class = '', $callback = '')
    {
        $post_name = $name . '_file';
        $post_value = $_POST[$post_name];
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <input title="Search for a file to add" type="file" name="<?php echo $name; ?>"
                       id="<?php echo $name; ?>"
                       class="uploadify image <?php echo $additional_class; ?>"<?php echo ($callback != '' ? ' data-callback="' . $callback . '"' : ''); ?>>
                <?php
                    if ( !empty($image_size_text) ) {
                        ?>
                        <p class="help-block">
                            <small class='text-muted'><?php echo $image_size_text; ?></small>
                        </p>
                        <?php
                    }
                ?>
                <div class="details">
                    <?php
                        if ( !empty($value) ) {
                            ?>
                            <img src="<?php echo $image_folder . $value; ?>"/>
                            <?php
                            if ( empty($post_value) ) {
                                ?>
                                <div>
                                    <a href="#" class="remove">Remove Image</a>
                                </div>
                                <?php
                            }
                        }
                    ?>
                    <input type="hidden" name="<?php echo $post_name; ?>" value="<?php echo $value; ?>"/>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Draw an image upload field
     *
     * @param string $name
     * @param string $label
     * @param array $value_array array of values
     * @param string $folder_url folder that the file is stored in
     * @param string $upload_note helper text to display below the upload field
     * @param string $additional_class
     **/
    function drawFileUploadFieldAlternate ($name, $label, $value, $folder_url, $upload_note = '', $additional_class = '', $callback = '')
    {
        $post_name = $name . '_file';
        $post_value = $_POST[$post_name];
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <input title="Search for a file to add" type="file" name="<?php echo $name; ?>"
                       id="<?php echo $name; ?>"
                       class="uploadify <?php echo $additional_class; ?>"<?php echo ($callback != '' ? ' data-callback="' . $callback . '"' : ''); ?>>
                <?php
                    if ( !empty($upload_note) ) {
                        ?>
                        <p class="help-block">
                            <small class='text-muted'><?php echo $upload_note; ?></small>
                        </p>
                        <?php
                    }
                ?>
                <div class="details">
                    <?php
                        if ( !empty($value) ) {
                            ?>
                            <div>
                                <a href="<?php echo $folder_url . '/' . $value; ?>" target="_blank">View File</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                        href="#" class="remove">Remove File</a>
                            </div>
                            <?php
                        }
                    ?>
                    <input type="hidden" name="<?php echo $post_name; ?>" value="<?php echo $value; ?>"/>
                </div>
            </div>
        </div>
        <?php
    }
    
    function drawTinyMCETextArea ($name, $label, $value_array, $additional_class = '', $additional_params = '', $helpers = array ())
    {
        $additional_class .= ' tinymce';
        drawTextArea ($name, $label, $value_array, $additional_class, $additional_params, $helpers);
    }
    
    /**
     * Draw an image upload field
     *
     * @param string $name
     * @param string $label
     * @param array $value_array array of values
     * @param string $image_folder folder for the image preview
     * @param string $image_size_text helper text to display below the upload field
     * @param string $additional_class
     **/
    function drawImageUploadField ($name, $label, $value_array, $image_folder, $image_size_text = '', $additional_class = '', $callback = '')
    {
        $post_name = $name . '_file';
        $value = $value_array[$name];
        $post_value = $_POST[$post_name];
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <input title="Search for a file to add" type="file" name="<?php echo $name; ?>"
                       id="<?php echo $name; ?>"
                       class="uploadify image <?php echo $additional_class; ?>"<?php echo ($callback != '' ? ' data-callback="' . $callback . '"' : ''); ?>>
                <?php
                    if ( !empty($image_size_text) ) {
                        ?>
                        <p class="help-block">
                            <small class='text-muted'><?php echo $image_size_text; ?></small>
                        </p>
                        <?php
                    }
                ?>
                <div class="details">
                    <?php
                        if ( !empty($value) ) {
                            $image_folder . $value
                            ?>

                            <img src="<?php echo $image_folder . $value; ?>"/>
                            <?php
                            if ( empty($post_value) ) {
                                ?>
                                <div>
                                    <a href="#" class="remove">Remove Image</a>
                                </div>
                                <?php
                            }
                        }
                    ?>
                    <input type="hidden" name="<?php echo $post_name; ?>" value="<?php echo $value; ?>"/>
                </div>
            </div>
        </div>
        <?php
    }
    
    /**
     * Draw an image upload field
     *
     * @param string $name
     * @param string $label
     * @param array $value_array array of values
     * @param string $folder_url folder that the file is stored in
     * @param string $upload_note helper text to display below the upload field
     * @param string $additional_class
     **/
    function drawFileUploadField ($name, $label, $value_array, $folder_url, $upload_note = '', $additional_class = '', $callback = '')
    {
        $post_name = $name . '_file';
        $value = $value_array[$name];
        $post_value = $_POST[$post_name];
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <input title="Search for a file to add" type="file" name="<?php echo $name; ?>"
                       id="<?php echo $name; ?>"
                       class="uploadify <?php echo $additional_class; ?>"<?php echo ($callback != '' ? ' data-callback="' . $callback . '"' : ''); ?>>
                <?php
                    if ( !empty($upload_note) ) {
                        ?>
                        <p class="help-block">
                            <small class='text-muted'><?php echo $upload_note; ?></small>
                        </p>
                        <?php
                    }
                ?>
                <div class="details">
                    <?php
                        if ( !empty($value) ) {
                            ?>
                            <div>
                                <a href="<?php echo $folder_url . '/' . $value; ?>" target="_blank">View File</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a
                                        href="#" class="remove">Remove File</a>
                            </div>
                            <?php
                        }
                    ?>
                    <input type="hidden" name="<?php echo $post_name; ?>" value="<?php echo $value; ?>"/>
                </div>
            </div>
        </div>
        <?php
    }
    
    function drawCheckboxes ($name, $label, $values)
    {
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <?php
                    foreach ( $values as $value ) {
                        ?>
                        <label class='checkbox-inline'>
                            <input type='checkbox' name='<?php echo $name; ?>'
                                   value='<?php echo $value['value']; ?>'<?php echo ($value['checked'] ? ' checked="checked"' : ''); ?>>
                            <?php echo $value['label']; ?>
                        </label>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }
    
    function drawRadios ($name, $label, $values)
    {
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <?php
                    foreach ( $values as $value ) {
                        ?>
                        <label class='checkbox-inline'>
                            <input type='radio' name='<?php echo $name; ?>'
                                   value='<?php echo $value['value']; ?>'<?php echo ($value['checked'] ? ' checked="checked"' : ''); ?>>
                            <?php echo $value['label']; ?>
                        </label>
                        <?php
                    }
                ?>
            </div>
        </div>
        <?php
    }
    
    function drawNoteRow ($label, $text, $note = '', $hide_if_empty = true, $class = '')
    {
        if ( $hide_if_empty && $text == '' )
            return;
        ?>
        <div class="form-group <?php echo $class; ?>">
            <label class="col-md-3 control-label"><?php echo $label; ?></label>
            <div class="col-md-9">
                <div class="checkbox">
                    <?php echo $text; ?>
                </div>
                <?php
                    if ( !empty($note) ) {
                        ?>
                        <p class="help-block">
                            <small class='text-muted'><?php echo $note; ?></small>
                        </p>
                        <?php
                    }
                ?>
            </div>
        </div>
        
        <?php
    }
