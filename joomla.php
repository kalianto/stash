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
    
    /* Get Category Node */
    JCategories::getInstance($extension)->get($catid);
    
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

    /* Error Message and Exception handling */
    $application = JFactory::getApplication();
    $application->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), $type = '');
    
    //alternatively
    JFactory::getApplication()->enqueueMessage(JText::_('SOME_ERROR_OCCURRED'), $type = '');

    $type = array('warning', 'notice', 'error', 'message');




    
    
    
