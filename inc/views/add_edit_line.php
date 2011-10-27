<?
$page_title = ($action == 'add' ? 'Add a Line' : 'Edit Line');
$tmpl->set('title', $page_title);
$breadcrumbs[] = array('name' => 'Dashboard', 'url' => Dashboard::makeURL('list'),'active' => false);
//$breadcrumbs[] = array('name' => 'Edit Dashboard', 'url' => Dashboard::makeURL('edit',$graph),'active' => false);
$breadcrumbs[] = array('name' => $graph->prepareName(), 'url' => Graph::makeURL('edit',$graph),'active'=> false);
$breadcrumbs[] = array('name' => $page_title, 'url' => fURL::getWithQueryString(),'active'=> true);
$tmpl->set('breadcrumbs',$breadcrumbs);
$tmpl->place('header');
if (isset($line_id)) {
  $query_string = "&line_id=$line_id";
} elseif (isset($graph_id)) {
  $query_string = "&graph_id=$graph_id";  
} else {
  $query_string = '';
}
?>
  <div class="row">
    <div class="span6">
      <form action="<?php echo fURL::get() ?>?action=<? echo $action.$query_string; ?>" method="post">
        <div class="main" id="main">
          <fieldset>
                <div class="clearfix">
	      <label for="line-alias">Alias<em>*</em></label>
              <div class="input">
	        <input id="line-alias" class="span3" type="text" size="30" name="alias" value="<?php echo $line->encodeAlias() ?>" />
              </div>
            </div><!-- /clearfix -->
            <div class="clearfix">
              <label for="line-target">Target<em>*</em></label>
              <div class="input">             
	        <input id="line-target" class="span3" type="text" size="30" name="target" value="<?php echo $line->encodeTarget() ?>" />
              </div>
            </div><!-- /clearfix -->
            <div class="clearfix">
              <label for="line-color">Line Color<em>*</em></label>
              <div class="input">             
                  <input id="line-color" class="span3" type="text" size="30" name="color" value="<?php echo $line->encodeColor() ?>" />
              </div>
            </div><!-- /clearfix -->                  
        <div class="actions">
	      <input class="btn primary" type="submit" value="Save" />
              <input class="btn" type="submit" name="action::delete" value="Delete" />
              <div class="required"><em>*</em> Required field</div>
	      <input type="hidden" name="token" value="<?php echo fRequest::generateCSRFToken() ?>" />
            </div>
         </fieldset>
       </div>       
     </form>
    </div>
    <div class="span10"> 
    </div>
  </div>
</div>
<?php
$tmpl->place('footer');        