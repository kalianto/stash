<?php 

    /* Joomla Layout */
    // Create a layout object and ask it to render the sidebar
    $layout      = new JLayoutFile('joomla.sidebars.submenu', $basePath = null);
    $sidebarHtml = $layout->render($data);
    
    /* Component layouts */
    $layout = new JLayoutFile('my_layout', $basePath = JPATH_ROOT .'/components/com_something/layouts');
    $html = $layout->render($data);
    
    /* Using Layout Helper */
    echo JLayoutHelper::render('joomla.content.info_block.parent_category', $displayData);
    
    //or 
    echo JLayoutHelper::render('joomla.content.info_block.parent_category', $displayData,  $basePath = JPATH_ROOT .'/components/com_something/layouts');
    
    /* Plugin path layout file */
    $path = JPluginHelper::getLayoutPath('content', 'gchcontent', 'contact');
    // Render the page content
    ob_start();
    include $path;
    $html = ob_get_clean();
    return $html;
    
    /* Calling a plugin 
    *  @see modules/mod_articles_news/helper.php for more code
    */
    JFactory::getApplication()->triggerEvent('onContentAfterDisplay', array($context, $article, $params, $page));
    
    /* When doing AJAX posting to component 
    *  URL: index.php?option=com_something&task=something.method&param1=value1&param2=value2&....
    *  Datatype: JSON
    *  Use jQuery.ajax() or jQuery.post()
    */
    
    
    /* User methods */
    
    /* get authorised groups */
    JUser::getAuthorisedGroups();
    
    /* get authorised categories */
    JUser::getAuthorisedCategories();
    
    
    /* Redirect Page */
    JFactory::getApplication()->redirect($link, false);
    
    /* Content Router */
    JRoute::_(ContentHelperRouter::getArticleRoute($slug, $catslug);
    
    /* Get Category Node, for Content category */
    JCategories::getInstance('Content')->get($catid);

    /* Get Category Node, for Weblinks category */
    JCategories::getInstance('Weblinks')->get($catid);
    
    /* Get Components params */
    $params = JComponentHelper::getParams('com_something');
    
    /* Get Form Token */
    $token = JSession::getFormToken();
    
    /* Send email */
    JFactory::getMailer()->sendMail($mailfrom, $fromname, $emailAddress, $subject, $message, true);
    
    /* Error Logging */
    jimport('joomla.log.log');
    JLog::addLogger( array( 'text_file' => 'jlog.php' ) );
    JLog::add("This is my text!");
    
    //display the error message to user
    JLog::add("This is my text!", JLog::WARNING, 'jerror');

    /* Error Message and Exception handling */
    $application = JFactory::getApplication();
    $application->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), $type = '');
    
    //alternatively
    JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), $type = '');

    $type = array('warning', 'notice', 'error', 'message');
    
    
    /* Stylesheet inclusion */
    JHtml::stylesheet('com_mycomponent/default.css', array(), true);
    
    //you will get one of the following results
    /*
        - /templates/[template]/css/com_mycomponent/default.css
        - /media/com_mycomponent/css/default.css
        - /media/system/css/com_mycomponent/default.css
        - /templates/[template]/css/system/default.css
        - /media/system/css/default.css
    */

    /* JModelLegacry */
    JModelLegacy::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_categories/models', 'CategoriesModel');
    $model = JModelLegacy::getInstance('Categories', 'CategoriesModel', array('ignore_request' => true));
    
    /* JTable */
    JTable::addIncludePath(JPATH_ADMINISTRATOR . '/components/com_categories/tables', 'CategoriesTable');
    $cat =& JTable::getInstance('Category', 'CategoriesTable');
    
    /* load a record into the table object */
    $cat->load($catid);
    
    /* create or update a record using the table object */
    $cat->store();
    
    /* Select options */
    $data = array(
        array(
            'value' => 'redapple',
            'text' => 'Red apple',
            'attr' => array('data-price'=>'5'),
        ),
        array(
            'value' => 'greenapple',
            'text' => 'Green apple',
            'attr' => array('data-price'=>'3'),
        ),
    );
    
    $options = array(
        'id' => 'applesfield', // HTML id for select field
        'list.attr' => array( // additional HTML attributes for select field
            'class'=>'field-apples',
        ),
        'list.translate'=>false, // true to translate
        'option.key'=>'value', // key name for value in data array
        'option.text'=>'text', // key name for text in data array
        'option.attr'=>'attr', // key name for attr in data array
        'list.select'=>'greenapple', // value of the SELECTED field
    );
    
    $result = JHtmlSelect::genericlist($data,'apples',$options);
    //this will result in:
    <select id="applesfield" name="apples" class="field-apples">
        <option value="redapple" data-price="5">Red apple</option>
        <option value="greenapple" data-price="3" selected="selected">Green apple</option>
    </select>
    
    // Verify that the alias is unique
	// This is how joomla check for duplicate items in weblinks
	$table = JTable::getInstance('Post', 'GchNewsTable');
	if ($table->load(array('alias' => $this->alias, 'catid' => $this->catid)) && ($table->id != $this->id || $this->id == 0))
	{
        $this->setError(JText::_('COM_GCHNEWS_ERROR_UNIQUE_ALIAS'));
		return false;
	}
	
	//Joomla way to get JSON object from an array
    	$opt['backdrop'] = isset($params['backdrop']) ? (boolean) $params['backdrop'] : true;
	$opt['keyboard'] = isset($params['keyboard']) ? (boolean) $params['keyboard'] : true;
	$opt['show']     = isset($params['show']) ? (boolean) $params['show'] : true;
	$opt['remote']   = isset($params['remote']) ?  $params['remote'] : '';
	$options = JHtml::getJSObject($opt);
    
    // Build the active state filter options.
	$options = array();
	$options[] = JHtml::_('select.option', '1', 'COM_TEXT_PUBLISHED');
	$options[] = JHtml::_('select.option', '0', 'COM_TEXT_UNPUBLISHED');
    
