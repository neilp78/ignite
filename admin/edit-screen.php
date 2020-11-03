<?php //save
require_once('../includes/config.php');

$postID = $_GET['screenid'];

try {
  $stmt = $db->query('SELECT postID, postTitle, postCont, postSlug, postDate FROM blog_posts_seo WHERE postID ="'.$postID.'"');
  while($row = $stmt->fetch()){
    $postCont = $row['postCont'];
    $postTitle = $row['postTitle'];
    $postSlug = $row['postSlug'];
  }

} catch(PDOException $e) {
    echo $e->getMessage();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Protokit</title>
  <link href="theme/semantic.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=VT323&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="theme/gds-css.css">
  <style>
  .sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  .sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  .sortable li span { position: absolute; margin-left: -1.3em; }

  body, html {
    padding: 0px;
    margin:0px;
    background: #fff;
    font-family: "Roboto",sans-serif;
    font-size: 16px;
    line-height: 26px;
    -webkit-font-smoothing: antialiased;
    color: #616161;
  }
  .add-elements:hover {
    cursor: pointer;
    text-decoration: underline;
  }
  .item-<?php print $postID; ?> {
    background: #f1f4f6;
  }
  #canvas .ui-sortable div:hover,
  #canvas .ui-sortable span:hover,
  #canvas .ui-sortable p:hover,
  #canvas .ui-sortable h1:hover,
  #canvas .ui-sortable h2:hover,
  #canvas .ui-sortable h3:hover,
  #canvas .ui-sortable h4:hover,
  #canvas .ui-sortable h5:hover,
  #canvas .ui-sortable input:hover,
  #canvas .ui-sortable label:hover {
    background-color: #e6e6e6;
    cursor: pointer;
  }
  #canvas .ui-sortable {
    border: 2px dashed #f3f2f1;
  }
  #console {
    position: absolute;
    background: #fff;
    width: 46%;
    height: 80vh;
    top: -2%;
    right: -46%;
    margin: 5% auto auto auto;
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
  }
  #open-console {
    position: relative;
    width: 46%;
    height: 80vh;
    top: 57%;
    right: 8%;
    background: #fff;
    height: 8vh;
  }
  #area-2 {
    width:60%;
    float:left;
  }
  #area-3 {
    width:33%;
    float:right;
  }
  #overlay-background {
    opacity: .48;
    background-color: rgba(33,33,33,1.0);
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    top: 0;
    -webkit-transition: opacity 450ms;
    transition: opacity 450ms;
    z-index: 89;
  }
  #tool-bar {
    padding: 2%;
    overflow-y: scroll;
    max-height: 90vh;
    margin-top:20px;
    padding-bottom: 50px;
  }

  #tool-bar::-webkit-scrollbar-track {
    background: #fff;
  }
  #tool-bar #tab-elements-content {
    border-bottom: none;
    border-right: none;
    border-left: none;
  }
  #tool-bar input,
  #tool-bar select {
    width: 100%;
    margin-bottom: 7px;
  }
  .positionsetting {
    width:50% !important;
  }
  .ui.label {
    background: none;
  }
  .ui.input {
    font-size: 1em;
    width: 97%;
    margin: 5% 0;
  }
  #tool-bar .section-header {
    font-weight: 700;
    font-size: 12px;
  }
  #tool-bar .divider {
    border-bottom: 1px solid rgba(34,36,38,.15);
    margin: 16px 0;
  }
  #editor-area {
    overflow: scroll;
    margin: 2%;
    position: fixed;
    height: 88vh;
    margin-top: 40px;
    background-color: #fff;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.04), 0 16px 56px 0 rgba(0,0,0,0.1);
    box-shadow: 0 0 0 1px rgba(0,0,0,0.04), 0 16px 56px 0 rgba(0,0,0,0.1);
    -webkit-transform: translateY(0);
    transform: translateY(0);
    opacity: 1;
  }
  #paragraph-text {
    max-height: 60vh;
    overflow: scroll;
    position: relative;
    background: #fff;
    -webkit-box-shadow: 0 1px 2px 0 rgba(34,36,38,.15);
    box-shadow: 0 1px 2px 0 rgba(34,36,38,.15);
    margin: 1rem 0;
    padding: 1em 1em;
    border-radius: .28571429rem;
    border: 1px solid rgba(34,36,38,.15);
  }
/*  .button {
    background-color: #4CAF50;
    border: none;
    color: white;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    font-size: 13px;
    height: 32px;
    margin: 0 8px 8px 0;
    padding: 0 4px 0 12px;
  }
  .delete-button {
    background-color: #ff0018;
    color: #fff;
  }
  .cancel-button {
    background-color: #999;
  } */
  .console {
    position: fixed;
    height: 7vh;
    width: 56.8vw;
    background: blue;
    right: 22px;
    top: 2px;
  }
  .edit-element *[contenteditable="true"] {
    background: #fff;
    padding: 2%;
    border: dotted 2px #999;
  }
  #canvas .sortablelist.connectedSortable {
    min-height: 20vh;
    padding: 1%;
    margin: 1%;
    border: 2px dashed #cecece;
  }

  .sortablelist:hover {
    background:#fdfdfc;
  }
  .edit-element {
    display:none;
  }
  #colorpicker {
    display: inline-grid;
    grid-template-columns: auto auto auto auto;
  }
  #colorpicker div {
    border: 1px solid rgba(0, 0, 0, 0.8);
    padding: 10px;
  }
  .selected {
    border:1px dotted green;
  }
  #canvas {
    width:980px;
    overflow: hidden;
    padding:2%;
    position:relative;
    border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
    background: #fff;
    margin: 5% auto auto auto;
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
    min-height: 80vh;
  }
  #left-panel {
    width:20vw;
    float: left;
    background: #fff;
    height:100vh;
  }
  #canvas select {
    padding:5px;
  }
  #right-panel {
    width:80vw;
    float: right;
    background: #f1f4f6;
    height:100vh;
    overflow: scroll;
  }
  #right-panel::-webkit-scrollbar-track {
    background: #f1f4f6;
  }
  #right-panel-top {
    position: fixed;
    width: 80vw;
    z-index: 999;
  }
  .devices {
    margin: 7px 8px 0 0;
  }
  #right-panel-main {
    padding-top: 40px;
  }
  #play-prototype iframe {
    display: inline;
    margin: 6%;
    height: 90vh;
    border: none;
    width: 980px;
    overflow: hidden;
    position: relative;
    border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
    background: #fff;
    margin: 5% auto auto auto;
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
    margin: 6%;
  }
  .banner {
    background: #fff;
    height:8vh;
    background: #fafbfc;
    box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03);
    min-height: 55px;
  }
  #proto-footer, #proto-header {
    width:1000px;
  }
  #canvas fieldset {
    min-height:50px;
  }
  .activearea fieldset {
    background: #dcdcdc;
    padding:2%;
    border: 2px dashed #f3f2f1;

  }
  #top-nav {
    margin: 0px;
  }
  .menu-item {
    float: left;
  }
  .menu-item a, .dropbtn {
    display: inline-block;
    color:#333;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }
  .menu-item a:hover, .dropdown:hover .dropbtn {
    background-color: #616161;
    color: #fff;
  }
  .menu-item.dropdown {
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
  }
  #tab-page-view-content ul {
    margin-left: 0px;
    padding-left: 0px;
  }
  #tab-page-view-content ul li {
    list-style: none;
  }
  #tab-page-view-content ul li a:hover{
    text-decoration: underline;
  }
  #canvas fieldset:before {
    content: 'FIELDSET';
    font-weight: 900;
    margin: 1%;
    color: #c5c3c3;
  }
  .dropdown-content a:hover {
    background-color: #616161;
    color: #fff;
  }
  .dropdown:hover .dropdown-content {
    display: block;
  }

  .ui.icon.top.right.pointing.dropdown.button {
    background: #fff;
    border: 1px solid rgba(34, 36, 38, 0.15);
    float: right;
  }
  #inspector {
    font-family: 'VT323', monospace;
    font-size:10px;
    color: #fff;
    width: 40%;
    text-align: center;
  }

  /* The Close Button */
  .close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }
  .save-actions {
    position: fixed;
    bottom: 5px;
    background: #fff;
    z-index: 99;
    width: 20%;
    left: 0;
    padding: 1%;
    border-top: 1px solid #dededf;
  }
  .close:hover,
  .close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
  }

  /*notes*/
  .note {
    width:50px;
    height:90px;
    background:yellow;
    padding:2%;
    padding-top:4%;
  }
  .note div {
    width:80%;
    margin:2%;
  }

  #tab-page-view:hover,
  #tab-elements:hover {
    cursor: pointer;
  }
  .show-boundries div,
  .show-boundries tr,
  .show-boundries table,
  #canvas.show-boundries * div,
  #canvas.show-boundries * tr,
  #canvas.show-boundries * table,
  .show-boundries * {
    padding:5px;
    border: 2px dashed #626a6e;
    margin: 5px;
  }
  .show-boundries table:before,
  #canvas.show-boundries * table:before {
    content: 'TABLE';
    padding:1px;
  }
  .show-boundries tr:before,
  #canvas.show-boundries * tr:before {
    content: 'TABLE ROW';
    padding:1px;
  }
  .show-boundries div:before,
  #canvas.show-boundries * div:before {
    content: 'DIV';
  }
  #canvas tr {
    padding: 2px;
  }
  .mobile-frame {
    background: url(theme/mobile.png) no-repeat;
    background-size: 350px;
    margin: 36px;
    overflow: hidden;
    padding: 93px 7px 0px 0px;
    height: 680px;
    margin-left: 350px;
    background-position: 10px;
  }
  .mobile-frame #play-prototype-frame {
    width: 276px;
    height: 500px;
    margin: 10px 0px 0px 47px;
  }
  .devices {
    float:right;
  }
  .hide-conditions {
    display: none;
  }
  #canvas .sortablelist.connectedSortable.activearea {
    border: 2px dashed #626a6e;
  }
  .activearea:hover {
    background:#f3f2f1;
  }
  @media (min-width: 40.0625em){
    #canvas .govuk-grid-column-full {
      width: 97%;
      float: left;
    }
  }
  @media (min-width: 40.0625em) {
    #canvas .govuk-grid-column-two-thirds {
        width: 61.6666%;
        float: left;
    }
  }
  #area-2, #area-3 {
    min-height: 50vh !important;
  }
  .preview-button {
    float:right;
    margin: 10px 20px 0px 0px;
  }
  .screen-title-input {
    width: 235px !important;
    padding: 0px 0 0 7px !important;
  }
  .preview-button-wrapper {
    padding: 10px !important;
  }
  .layout:hover {
    text-decoration: underline;
    cursor: pointer;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="theme/semantic.js"></script>
  <!--<script src="theme/accessibility.js"></script>-->
  <script>
    window.projectID = 1;
    $(function() {

	    $( ".sortablelist" ).sortable({
	      connectWith: ".connectedSortable",
	      receive: function(event, ui) {},
	      update: function (event, ui) {
	        savehtml();
	      },
	      cancel: 'input',
	    })
	  });
  $('.sortable *').addClass('ui-state-defadivt');
  $('.color').each(function(){
    var colour = $(this).text();
    console.log(colour);
    $(this).css('background',colour);
  });

  </script>
</head>
<body>
<!--<div id="colorpicker" class="grid-container">
   <div class="color">#d4351c</div>
   <div class="color">#ffdd00</div>
   <div class="color">#1d70b8</div>
   <div class="color">#003078</div>
   <div class="color">#5694ca</div>
   <div class="color">#4c2c92</div>
   <div class="color">#0b0c0c</div>
   <div class="color">#626a6e</div>
   <div class="color">#f3f2f1</div>
   <div class="color">#ffffff</div>
   <div class="color">#912b88</div>
   <div class="color">#d53880</div>
   <div class="color">#f499be</div>
   <div class="color">#f47738</div>
   <div class="color">#b58840</div>
   <div class="color">#85994b</div>
   <div class="color">#28a197</div>
</div>-->
<div class="ui basic modal html-modal">
  <div class="ui fullscreen modal transition visible active" style="display: block !important;">
      <i class="close icon"></i>
      <div class="header">
        Add pattern
      </div>
      <div class="content">
        <div class="ui form">
          <div class="field">
            <label>Add HTML</label>
            <textarea></textarea>
          </div>
        </div>
      </div>
      <div class="actions">
        <div class="ui button">Cancel</div>
        <div class="ui green button">Send</div>
      </div>
    </div>
</div>

<div id="left-panel">
  <div id="left-panel-top" class="banner">
    <div class="ui input screen-title-input">
      <input id="screen-title" type="text" value="<?php print $postTitle; ?>" />
    </div>
  </div>
  <div id="left-panel-bottom">

    <div id="tool-bar">
      <div class="ui top attached tabular menu">
        <div id="tab-elements" class="active item">Elements</div>
        <div id="tab-page-view" class="inactive item">Pages</div>
      </div>
    <div id="tab-elements-content" class="ui bottom attached active tab segment">
      <div class="ui black message" id="inspector"></div>
      <div class="elements">
        <div class="ui styled accordion">
          <div class="title">
            <i class="dropdown icon"></i>
            Layout
          </div>
          <div class="content">
            <div class="layout layout1">Full width</div>
            <div class="layout layout2">3 x 6</div>
            <div class="layout layout3">6 x 3</div>
            <div class="layout layout4">3 x 3 x 3</div>
          </div>
          <div class="title">
            <i class="dropdown icon"></i>
            Text
          </div>
          <div class="content">
            <div data-element="h1" class="add-elements add-h1">Heading 1</div>
            <div data-element="h2" class="add-elements add-h2">Heading 2</div>
            <div data-element="h3" class="add-elements add-h3">Heading 3</div>
            <div data-element="h4" class="add-elements add-h4">Heading 4</div>
            <div data-element="h5" class="add-elements add-h5">Heading 5</div>
            <div data-element="paragraph" class="add-elements add-paragraph">Paragraph</div>
            <div data-element="details" class="add-elements add-paragraph">Details</div>
          </div>
          <div class="title">
            <i class="dropdown icon"></i>
            Forms
          </div>
          <div class="content">
            <div data-element="fieldset" class="add-elements add-fieldset">Fieldset</div>
            <div data-element="radio" class="add-elements add-radio">Radio</div>
            <div data-element="radio-group" class="add-elements add-radio">Radio group</div>
            <div data-element="select" class="add-elements add-select">Select</div>
            <div data-element="textfield" class="add-elements add-textfield">Text field</div>
            <div data-element="checkbox" class="add-elements add-checkbox">Checkbox</div>
            <div data-element="password" class="add-elements add-password">Password</div>
            <div data-element="email" class="add-elements add-email">Email</div>
            <div data-element="textarea" class="add-elements add-textarea">Textarea</div>
            <div data-element="date" class="add-elements add-date">Date</div>
            <div data-element="fileupload" class="add-elements add-fileupload">File upload</div></div>
          <div class="title">
            <i class="dropdown icon"></i>
            Buttons
          </div>
          <div class="content">
            <div data-element="green-button" class="add-elements add-green-button">Green button</div>
            <div data-element="secondary-button" class="add-elements add-secondary-button">Secondary button</div>
            <div data-element="red-button" class="add-elements add-red-button">Red button</div>
            <div data-element="disabled-button" class="add-elements add-disabled-button">Disabled button</div>
            <div data-element="start-button" class="add-elements add-start-button">Start button</div>
          </div>
          <div class="title">
            <i class="dropdown icon"></i>
            Navigation
          </div>
          <div class="content">
            <div data-element="breadcrumb" class="add-elements add-breadcrumb">Breadcrumb</div>
            <div data-element="backlink" class="add-elements add-backlink">Backlink</div>
          </div>
          <div class="title">
            <i class="dropdown icon"></i>
            Tables
          </div>
          <div class="content">
            <div data-element="table" class="add-elements add-table">Table</div>  </div>
          </div>

      </div>
      <div class="edit-element button">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">BUTTON</h2>
        <div class="edit-html" contenteditable="true"></div>
        <div class="divider"></div>
          <div class="section-header">Convert to link</div>
          <div class="covert-to-link ui button mini">Convert</div>
        <div class="divider"></div>

        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>
      <div class="edit-element div">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">SELECT</h2>
        <div class="edit-html" contenteditable="true"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element div">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">DIV HTML</h2>

        <div class="edit-html" contenteditable="true"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element input">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Form element</h2>
        <div class="divider"></div>
        <div class="section-header">Input name</div>
        <div class="ui input">
          <input class="input-name" type="text" id="input-name" name="input-name">
        </div>
        <div class="divider"></div>
        <div class="section-header">Input type</div>
        <div class="ui input">
          <input class="input-type" type="text" id="input-type" name="input-type">
        </div>
        <div class="divider"></div>
        <div class="section-header">Input value</div>
        <div class="ui input">
          <input class="input-value" type="text" id="input-value" name="input-value">
        </div>
        <div class="divider"></div>
        <div class="ui checkbox">
          <input id="use-data" type="checkbox">
          <label>Use data</label>
          <div class="ui compact segment get-use-data-code">
            <p></p>
          </div>
        </div>
        <div class="divider"></div>
        <div class="hide-conditions">
          <div class="section-header">Conditions</div>
          <select class="button-link ui dropdown conditions">
            <option>- Select a screen -</option>
             <?php
               try {
                 $stmt = $db->query('SELECT postTitle, postSlug FROM blog_posts_seo ORDER BY postTitle');
                 while($row = $stmt->fetch()){
                   //echo '<div class="ui-pages"><a href="edit-screen.php?postid='.$row['postID'].'"><i class="file icon"></i> '.$row['postTitle'].'</a></div>';
                   print '<option value="'.$row['postSlug'].'">'.$row['postTitle'].'</option>';
                 }
               } catch(PDOException $e) {
                   echo $e->getMessage();
               }
             ?>
           </select>
         </div>
        <div class="divider"></div>
        <div class="section-header">Margin</div>
        <div class="divider"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element fieldset">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Select</h2>
        <div class="select-options"></div>
        <div class="divider"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element fieldset">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Fieldset</h2>
        <div class="divider"></div>
        <div class="ui input">
          <input class="form-action" type="text" id="form-action" name="form-action">
        </div>
        <div class="divider"></div>
        <div class="save-actions">
          <div class="submit-edit ui button green mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element td">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Table D</h2>
        <div class="ui icon buttons">
          <button class="ui button" type="button" onclick="surroundSelection()" value="Bold"><i class='bold icon'></i></button>
          <button class="ui button" type="button" onclick="italicSelection()" value="Intalic"><i class='italic icon'></i></button>
          <button class="ui button" type="button" onclick="linkSelection()" value="Link"><i class='linkify icon'></i></button>
        </div>
        <div class="ui input">
          <input type="text" id="addurl" />
        </div>
        <select id="text-type" class="ui dropdown">
          <option value="h1">H1</option>
          <option value="h2">H2</option>
          <option value="h3">H3</option>
          <option value="h4">H4</option>
          <option value="lead">Lead</option>
          <option value="bold">Body</option>
          <option value="inset">Inset</option>
          <option value="captionxl">XL Caption</option>
          <option value="captionl">L Caption</option>
          <option value="captionm">M Caption</option>
          <option value="captions">S Caption</option>
        </select>
        <div class="divider"></div>
        <select id="format" class="ui dropdown">
          <option value="h1">XL</option>
          <option value="h2">L</option>
          <option value="h3">M</option>
          <option value="h4">S</option>
        </select>
        <div id="paragraph-text" contenteditable="true"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element th">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Table head</h2>
        <div class="divider"></div>
        <div class="ui icon buttons">
          <button class="ui button" type="button" onclick="surroundSelection()" value="Bold"><i class='bold icon'></i></button>
          <button class="ui button" type="button" onclick="italicSelection()" value="Intalic"><i class='italic icon'></i></button>
          <button class="ui button" type="button" onclick="linkSelection()" value="Link"><i class='linkify icon'></i></button>
        </div>
        <div class="divider"></div>
        <div class="ui input">
          <input type="text" id="addurl" />
        </div>
        <div class="divider"></div>
        <select id="text-type" class="ui dropdown">
          <option value="h1">H1</option>
          <option value="h2">H2</option>
          <option value="h3">H3</option>
          <option value="h4">H4</option>
          <option value="lead">Lead</option>
          <option value="bold">Body</option>
          <option value="inset">Inset</option>
          <option value="captionxl">XL Caption</option>
          <option value="captionl">L Caption</option>
          <option value="captionm">M Caption</option>
          <option value="captions">S Caption</option>
        </select>
        <div class="divider"></div>
        <select id="format" class="ui dropdown">
          <option value="h1">XL</option>
          <option value="h2">L</option>
          <option value="h3">M</option>
          <option value="h4">S</option>
        </select>
        <div class="divider"></div>
        <div id="paragraph-text" contenteditable="true"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element tr">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Table row</h2>
        <div class="divider"></div>
        <div class="ui icon buttons">
          <button class="ui button" type="button" onclick="surroundSelection()" value="Bold"><i class='bold icon'></i></button>
          <button class="ui button" type="button" onclick="italicSelection()" value="Intalic"><i class='italic icon'></i></button>
          <button class="ui button" type="button" onclick="linkSelection()" value="Link"><i class='linkify icon'></i></button>
        </div>
        <div class="ui input">
          <input type="text" id="addurl" />
        </div>
        <select id="text-type" class="ui dropdown">
          <option value="h1">H1</option>
          <option value="h2">H2</option>
          <option value="h3">H3</option>
          <option value="h4">H4</option>
          <option value="lead">Lead</option>
          <option value="bold">Body</option>
          <option value="inset">Inset</option>
          <option value="captionxl">XL Caption</option>
          <option value="captionl">L Caption</option>
          <option value="captionm">M Caption</option>
          <option value="captions">S Caption</option>
        </select>
        <div class="divider"></div>
        <select id="format" class="ui dropdown">
          <option value="h1">XL</option>
          <option value="h2">L</option>
          <option value="h3">M</option>
          <option value="h4">S</option>
        </select>
        <div class="divider"></div>
        <div id="paragraph-text" contenteditable="true"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element p">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Paragraph</h2>
        <div class="ui icon buttons">
          <button class="ui button" type="button" onclick="surroundSelection()" value="Bold"><i class='bold icon'></i></button>
          <button class="ui button" type="button" onclick="italicSelection()" value="Intalic"><i class='italic icon'></i></button>
          <button class="ui button" type="button" onclick="linkSelection()" value="Link"><i class='linkify icon'></i></button>
        </div>
        <div class="divider"></div>
        <div class="ui input">
          <input type="text" id="addurl" />
        </div>
        <div class="divider"></div>
        <select id="text-type" class="ui dropdown">
          <option value="h1">H1</option>
          <option value="h2">H2</option>
          <option value="h3">H3</option>
          <option value="h4">H4</option>
          <option value="lead">Lead</option>
          <option value="bold">Body</option>
          <option value="inset">Inset</option>
          <option value="captionxl">XL Caption</option>
          <option value="captionl">L Caption</option>
          <option value="captionm">M Caption</option>
          <option value="captions">S Caption</option>
        </select>
        <div class="divider"></div>
        <select id="format" class="ui dropdown">
          <option value="h1">XL</option>
          <option value="h2">L</option>
          <option value="h3">M</option>
          <option value="h4">S</option>
        </select>
        <div id="paragraph-text" contenteditable="true"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element heading">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Heading</h2>
        <div class="divider"></div>
        <div class="heading-text" contenteditable="true"></div>
        <div class="divider"></div>
        <div class="heading-size"></div>
        <div class="divider"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element label">
        <div class="ui icon top right pointing dropdown button">
          <i class="cog icon"></i>
          <div class="menu">
            <div class="delete-edit item">Delete</div>
            <div class="duplicate-edit item">Duplicate</div>
          </div>
        </div>
        <h2 class="ui header">Label</h2>
        <div class="divider"></div>
        <div class="label-text" contenteditable="true"></div>
        <div class="save-actions">
          <div class="submit-edit ui button mini green">Submit</div>
          <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
        </div>
      </div>

      <div class="edit-element link">
        <div class="ui icon top right pointing dropdown button">
        <i class="cog icon"></i>
        <div class="menu">
          <div class="delete-edit item">Delete</div>
          <div class="duplicate-edit item">Duplicate</div>
        </div>
      </div>
      <h2 class="ui header">Link</h2>
      <div class="section-header">Links to</div>
      <select class="button-link ui dropdown internal-url">
        <option>- Select a screen -</option>
         <?php
           try {
             $stmt = $db->query('SELECT postTitle, postSlug FROM blog_posts_seo');
             while($row = $stmt->fetch()){
               //echo '<div class="ui-pages"><a href="edit-screen.php?postid='.$row['postID'].'"><i class="file icon"></i> '.$row['postTitle'].'</a></div>';
               print '<option value="'.$row['postSlug'].'">'.$row['postTitle'].'</option>';
             }
           } catch(PDOException $e) {
               echo $e->getMessage();
           }
         ?>
       </select>
      <div class="ui input">
        <input type="text" class="link-target" value="">
      </div>
      <div class="divider"></div>
      <div class="section-header">Link text</div>
      <div class="ui input">
        <input type="text" class="link-text" value="">
      </div>
      <div class="divider"></div>
      <div class="section-header">Link type</div>
      <div class="ui input">
        <input type="text" class="link-type" value="">
      </div>
      <div class="divider"></div>
      <div class="link-style"></div>
      <div class="divider"></div>
      <div class="save-actions">
        <div class="submit-edit ui button mini green">Submit</div>
        <div class="cancel-edit ui button cancel-button mini blue">Cancel</div>
      </div>
    </div>
      <div class="position-settings-panel">
        <div class="section-header">Margin</div>
        <div class="ui input">
        <div class="ui label">Top</div><br>
          <input class="positionsetting" id="margin-top" type="number" value="0" min="0" max="9"/>
        </div>
        <div class="ui input">
          <div class="ui label">Right</div><br>
          <input class="positionsetting" id="margin-right" type="number" value="0" min="0" max="9"/>
        </div>
        <div class="ui input">
          <div class="ui label">Bottom</div><br>
          <input class="positionsetting" id="margin-bottom" type="number" value="0" min="0" max="9"/>
        </div>
        <div class="ui input">
          <div class="ui label">Left</div><br>
          <input class="positionsetting" id="margin-left" type="number" value="0" min="0" max="9"/>
        </div>
        <div class="divider"></div>
        <div class="section-header">Padding</div>
        <div class="ui input">
        <div class="ui label">Top</div><br>
          <input class="positionsetting" id="padding-top" type="number" value="0" min="0" max="9"/>
        </div>
        <div class="ui input">
          <div class="ui label">Right</div><br>
          <input class="positionsetting" id="padding-right" type="number" value="0" min="0" max="9"/>
        </div>
        <div class="ui input">
          <div class="ui label">Bottom</div><br>
          <input class="positionsetting" id="padding-bottom" type="number" value="0" min="0" max="9"/>
        </div>
        <div class="ui input">
          <div class="ui label">Left</div><br>
          <input class="positionsetting" id="padding-left" type="number" value="0" min="0" max="9"/>
        </div>
      </div>
    </div>
    <div id="tab-page-view-content" class="ui bottom attached inactive tab segment">
      <ul>
      <?php
        try {
          $stmt2 = $db->query('SELECT postID, postTitle, postSlug FROM blog_posts_seo ORDER BY postTitle');
          while($row2 = $stmt2->fetch()){
            //echo '<div class="ui-pages"><a href="edit-screen.php?postid='.$row['postID'].'"><i class="file icon"></i> '.$row['postTitle'].'</a></div>';
            print '<li class="item-'.$row2['postID'].'"><a class="item" href="edit-screen.php?screenid='.$row2['postID'].'"><i class="file outline icon"></i> '.$row2['postTitle'].'</a></li>';
            }
          } catch(PDOException $e) {
              echo $e->getMessage();
          }
        ?>
      </ul>
    </div>


    </div>
  </div>
</div>
<div id="right-panel">
  <div id="right-panel-top" class="banner">
    <ul id="top-nav">
      <li class="dropdown menu-item">
        <a href="javascript:void(0)" class="dropbtn">New</a>
        <div class="dropdown-content">
          <a href="new-screen.php" class="option new-screen">New screen</a>
          <a href="#" class="option duplicate-screen">Duplicate screen</a>
          <a href="#" class="option delete-screen">Delete screen</a>
        </div>
      </li>
      <li class="dropdown menu-item">
        <a href="javascript:void(0)" class="dropbtn">View</a>
        <div class="dropdown-content">
          <a href="#" class="option see-play">Play prototype</a>
          <a href="#" class="option see-stop">Stop prototype</a>
          <a href="#" class="option play-mobile">Mobile</a>
          <a href="#" class="option play-mobile-stop">Stop mobile</a>
          <a href="#" class="option see-html">HTML</a>
          <a href="#" class="option see-qr">QR</a>
          <a href="#" class="option show-boundries-control">Show boundries</a>
          <a href="#" class="option hide-boundries-control">Hide boundries</a>
        </div>
      </li>
      <li class="dropdown menu-item">
        <a href="javascript:void(0)" class="dropbtn">Create</a>
        <div class="dropdown-content">
          <a id="new-pattern" href="#" class="option new-pattern">New pattern</a>
          <a href="#" class="option new-layout">New layout</a>
          <a href="#" class="option build">Build</a>
        </div>
      </li>
      <li class="dropdown menu-item">
        <a href="javascript:void(0)" class="dropbtn">Validate</a>
        <div class="dropdown-content">
          <a href="#" class="option accessibility-scan">Accessibility</a>
          <a href="#" class="option see-qr">QR</a>
          <a href="#">Link 3</a>
        </div>
      </li>
      <li class="dropdown menu-item">
        <a href="javascript:void(0)" class="dropbtn">Layouts</a>
        <div class="dropdown-content">
          <a href="#" class="option sixty-six">6 x 3</a>
          <a href="#" class="option thirty-three">3 x 6</a>
          <a href="#" class="option full-width">Full width</a>
        </div>
      </li>
    </ul>
    <div class="preview-button-wrapper">
      <a class="preview-button ui blue button compact" target="_blank" href="../<?php print $postSlug; ?>"><i class="play icon"></i> Preview</a>
    </div>
    <div id="save-alert"></div>
    <div id="preview"></div>

  </div>
  <div id="right-panel-main">
    <div id="play-prototype">
      <iframe id="play-prototype-frame" src="../<?php print $postSlug; ?>"></iframe>
    </div>
    <div id="canvas" class="govuk-width-container">
      <?php print $postCont; ?>
    </div>
  </div>
</div>
</body>
<script>


  //ui controls govuk-grid-column-full


  //$("#tab-page-view-content").load(location.href + " #tab-page-view-content");
  /* ---- Toggle iFrame ---- */
  $('#play-prototype, .see-stop').hide();
  $('.see-play').click(function(){
    savehtml();
    document.getElementById('play-prototype-frame').contentDocument.location.reload(true);
    $('#play-prototype, .see-stop').show();
    $('#canvas, .see-play').hide();
    localStorage.clear();
  });
  $('.play-mobile').click(function(){
    savehtml();
    $('#play-prototype').addClass('mobile-frame');
    document.getElementById('play-prototype-frame').contentDocument.location.reload(true);
    $('#play-prototype, .see-play, .devices, .play-mobile-stop').show();
    $('#canvas, .play-mobile').hide();
    localStorage.clear();
  });
  $('.play-mobile-stop, .devices').hide();
  $('.play-mobile-stop').click(function(){
    $('#play-prototype').hide();
    $('#canvas').show();
    $(this).hide();
  });
  $('.see-stop').click(function(){
    savehtml();
    $('#play-prototype, .see-stop').hide();
    $('#canvas, .play-mobile, .see-play').show();
  });
  /* ---- show boundries ---- */
  $('.hide-boundries-control').hide();
  $('.show-boundries-control').click(function(){
    $('#canvas').addClass('show-boundries');
    $('.show-boundries-control').hide();
    $('.hide-boundries-control').show();
  });
  $('.hide-boundries-control').click(function(){
    $('#canvas').removeClass('show-boundries');
    $('.show-boundries-control').show();
    $('.hide-boundries-control').hide();
  });

  /* ---- TABS  ----  */
  function showElements() {
    $('#tab-page-view').removeClass('active');
    $('#tab-elements').addClass('active');
    $('#tab-elements-content').show();
    $('#tab-page-view-content').hide();
  }
  $('#tab-elements').click(function(){
    showElements();
  });
  $('#tab-page-view').click(function(){
    $('#tab-elements').removeClass('active');
    $(this).addClass('active');
    $('#tab-elements-content').hide();
    $('#tab-page-view-content').show();
  });
/* ---- END TABS  ----  */

/* ---- LAYOUT  ----  */
$('.sixty-six').click(function(){
  $('#area-2').removeClass('govuk-grid-column-one-third').addClass('govuk-grid-column-two-thirds');
  $('#area-3').addClass('govuk-grid-column-one-third').removeClass('govuk-grid-column-two-thirds');
});
$('.thirty-three').click(function(){
  $('#area-3').removeClass('govuk-grid-column-one-third').addClass('govuk-grid-column-two-thirds');
  $('#area-2').addClass('govuk-grid-column-one-third').removeClass('govuk-grid-column-two-thirds');
});
$('.full-width').click(function(){

});
/* ---- END LAYOUT  ----  */

/* ---- Get GOV Classes --- */
  function getClasses(){
    window.getGovClassess = $('.selected *[class^="govuk"]');
    console.log(getGovClassess);
  }

  //$('.connectedSortable').click(function(){
  $(document).on('click','.connectedSortable', function(){
    $('.connectedSortable').removeClass('activearea');
    $(this).addClass('activearea');
  });

  $('.color').each(function(){
    var colour = $(this).text();
    //console.log(colour);
    $(this).css('background',colour).css('font-size','0');
  });

  $('.build').click(function(){
    //alert('Built');
    $.post("build.php", {
      build: 'build'
    });
  });

  /* ---- change page title ---- */
  window.screenTitle = $('#screen-title').val();
  $('#screen-title').blur(function(){
    window.screenTitle = $(this).val();
    savehtml();
    $('#tab-page-view-content ul').load('save.php #tab-page-view-content-refresh ul');
  });
  //save #canvas html
  function savehtml() {
    var newCanvas = $('#canvas').html();
		$.post("save.php", {
			postID: "<?php print $postID; ?>",
			postTitle: screenTitle,
      postSlug: "<?php print $postTitle . $postID; ?>",
      postCont: newCanvas
		});
    $('#save-alert').load('save.php #saved-noticed');
    $('#preview').load('save.php #view');
    document.getElementById('play-prototype-frame').contentDocument.location.reload(true);
    $('#tab-page-view-content ul').load('save.php #tab-page-view-content-refresh ul');
  }

  $('#canvas *').on('mouseover', function (event) {
    $target = $(event.target);
    $('#inspector').text($target.prop('nodeName'));
    //$(this).append('<div class="pill">'+$target.prop('nodeName')+'</div>');
  });

  $('#canvas .sortablelist').on('dblclick', function (event) {
    $('.position-settings-panel').show();
    //get element double clicked on
    $target = $(event.target);
    //active dropdowns
    $('.ui.dropdown').dropdown();
    //Show elements menu
    showElements();
    //remove all other selected classes
    $('.selected').removeClass('selected');
    //hide Condition
    $('.hide-conditions').hide();
    $target.addClass('selected');
    //get type of input
    var inputtype = $($target).attr('type');
    //reset positioning values
    $('.positionsetting').val('0');
    if ($('.selected[class*="govuk-!-margin-top-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-top-") + 1);
      var positionVal = number.slice(- 1);
      //alert(positionVal);
      $('#margin-top').val(positionVal);
    }
    if ($('.selected[class*="govuk-!-margin-right-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-right-") + 1);
      var positionVal = number.slice(- 1);
      $('#margin-right').val(positionVal);
      //alert(positionVal);
    }
    if ($('.selected[class*="govuk-!-margin-bottom-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-bottom-") + 1);
      var positionVal = number.slice(- 1);
      $('#margin-bottom').val(positionVal);
      //alert(positionVal);
    }
    if ($('.selected[class*="govuk-!-margin-left-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("margin-left-") + 1);
      var positionVal = number.slice(- 1);
      $('#margin-left').val(positionVal);
    }
    if ($('.selected[class*="govuk-!-padding-top-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-top-") + 1);
      var positionVal = number.slice(- 1);
      $('#padding-top').val(positionVal);
    }
    if ($('.selected[class*="govuk-!-padding-right-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-right-") + 1);
      var positionVal = number.slice(- 1);
      $('#padding-right').val(positionVal);
    }
    if ($('.selected[class*="govuk-!-padding-bottom-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-bottom-") + 1);
      var positionVal = number.slice(- 1);
      $('#padding-bottom').val(positionVal);
    }
    if ($('.selected[class*="govuk-!-padding-left-"]').length > 0 ) {
      var martingtopclass = $(this).attr('class').split(' ')[0];
      var number = martingtopclass.substr(martingtopclass.lastIndexOf("padding-left-") + 1);
      var positionVal = number.slice(- 1);
      $('#padding-left').val(positionVal);
    }
    //hide elements menu
    $('.elements').hide();
    var type = $target.prop('nodeName');
    switch(type) {
      case 'SELECT':
        $('.edit-element.select').show('fast');
        $('.edit-element').hide();
        $('.edit-element.fieldset').show('fast');
        break;
      case 'FIELDSET':
        $('.edit-element').hide();
        $('.edit-element.fieldset').show('fast');
        break;
      case 'INPUT':
        $('.get-use-data-code').hide();
        console.log(inputtype);
        $('.edit-element').hide();
        $('.edit-element.input').show('fast');
        $('.input-name').val(($('.selected').attr('name')));
        $('.input-type').val(($('.selected').attr('type')));
        $('.input-value').val(($('.selected').attr('value')));
        $('.selected').attr('data-use-data');
        //prime the #use-data checkbox
        $('#use-data').prop('checked', false);
        if ($('.selected').attr('data-use-data') == 'use-data') {
          var currentInputName = $('.selected').attr('name');
          console.log('Name set');
          $('#use-data').prop('checked', true);
          $('.get-use-data-code p').text('[[['+currentInputName+']]]');
          $('.get-use-data-code').show();
        } else {
          console.log('Name not set');
          $('#use-data').prop('checked', false);
          $('.get-use-data-code p').text('');
          $('.get-use-data-code').hide();
        }
        if ($('.selected').is(':radio')) {
          $('.hide-conditions').show();
        }
        if(!$('.selected').prop('required')){
          console.log('not required');
        }
        break;
      case 'LABEL':
        console.log(inputtype);
        $('.edit-element').hide();
        $('.edit-element.label').show('fast');
        $('.label-text').text(($('.selected').text()));
        break;
      case 'BUTTON':
        console.log(inputtype);
        $('.edit-element').hide();
        $('.edit-element.button').show('fast');
        $('.label-text').text(($('.selected').text()));
        break;
      case 'H1':
        $('.edit-element').hide();
        $('.edit-element.heading').show('fast');
        console.log($(this).text());
        $('.heading-text').text($('.selected').text());
        break;
      case 'H2':
        $('.edit-element').hide();
        $('.edit-element.heading').show('fast');
        console.log($(this).text());
        $('.heading-text').text($('.selected').text());
        break;
      case 'H3':
        $('.edit-element').hide();
        $('.edit-element.heading').show('fast');
        console.log($(this).text());
        $('.heading-text').text($('.selected').text());
        break;
      case 'H4':
        $('.edit-element').hide();
        $('.edit-element.heading').show('fast');
        console.log($(this).text());
        $('.heading-text').text($('.selected').text());
        break;
      case 'H5':
        $('.edit-element').hide();
        $('.edit-element.heading').show('fast');
        console.log($(this).text());
        $('.heading-text').text($('.selected').text());
        break;
      case 'SELECT':
        $('.edit-element').hide();
        $('.edit-element.select').show('fast');
        console.log($(this).text());
        $('.select-option').text($('.selected').val());
        break;
      case 'P':
        $('.edit-element').hide();
        $('.edit-element.p').show('fast');
        //console.log($('.selected').text());
        $('.p #paragraph-text').text($('.selected').text());
        break;
      case 'SPAN':
        $('.edit-element').hide();
        $('.edit-element.p').show('fast');
        $('#paragraph-text').text($('.selected').text());
        break;
      case 'LI':
        $('.edit-element').hide();
        $('.edit-element.p').show('fast');
        $('#paragraph-text').text($('.selected').text());
        break;
      case 'DD':
        $('.edit-element').hide();
        $('.edit-element.p').show('fast');
        $('#paragraph-text').text($('.selected').text());
        break;
      case 'DIV':
        $('.edit-element').hide();
        $('.edit-element.div').show('fast');
        $('.edit-html').html($('.selected').html());
        break;
      case 'TD':
        $('.edit-element').hide();
        $('.edit-element.td').show('fast');
        $('.td #paragraph-text').html($('.selected').html());
        break;
      case 'TR':
        $('.edit-element').hide();
        $('.edit-element.tr').show('fast');
        $('.tr #paragraph-text').html($('.selected').html());
        break;
      case 'TH':
        $('.edit-element').hide();
        $('.edit-element.th').show('fast');
        $('.th #paragraph-text').html($('.selected').html());
        break;
      case 'A':
        $('.edit-element').hide();
        $('.edit-element.link').show('fast');
        $('.link-type').val($('.selected').attr('class'));
        $('.link-text').val($('.selected').text());
        //loop through classes
        var classes = $('.selected').attr('class').split(' ');;
        for(var i = 0; i < classes.length; i++) {
        }
        $('.link-target').val($('.selected').attr('href'));
        break;
      default:
        // code block
        break;
    }
  });

  //submit edits
  function linkSelection() {
    var a = document.createElement("a");
    a.classList.add("govuk-link");
    if (window.getSelection) {
      var sel = window.getSelection();
      if (sel.rangeCount) {
        var range = sel.getRangeAt(0).cloneRange();
        range.surroundContents(a);
        var newUrl = document.getElementById("addurl").value;
        a.setAttribute("href",newUrl);
        sel.removeAllRanges();
        sel.addRange(range);
      }
    }
  }

  function surroundSelection() {
    var span = document.createElement("span");
    span.style.fontWeight = "bold";
    //span.style.color = "green";

    if (window.getSelection) {
      var sel = window.getSelection();
      if (sel.rangeCount) {
        var range = sel.getRangeAt(0).cloneRange();
        range.surroundContents(span);
        sel.removeAllRanges();
        sel.addRange(range);
      }
    }
  }

  $('#text-type').on('change', function() {
    var textType = ( this.value );
    switch(textType) {
      case 'h1':
        var h1 = document.createElement("h1");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(h1);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'h2':
        var h2 = document.createElement("h2");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(h2);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'h3':
        var h3 = document.createElement("h3");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(h3);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'h4':
        var h4 = document.createElement("h4");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(h4);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'inset':
        var inset = document.createElement("div");
        inset.classList.add("govuk-inset-text");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(inset);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'lead':
        var inset = document.createElement("div");
        inset.classList.add("govuk-inset-text");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(inset);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
      case 'bold':
        var inset = document.createElement("div");
        inset.classList.add("govuk-inset-text");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(inset);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'captionxl':
        var captionxl = document.createElement("span");
        captionxl.classList.add("govuk-caption-xl");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(captionxl);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'captionm':
        var captionm = document.createElement("span");
        captionm.classList.add("govuk-caption-m");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(captionm);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'captions':
        var captions = document.createElement("span");
        captions.classList.add("govuk-caption-s");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(captions);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
      case 'bold':
        var bold = document.createElement("span");
        bold.classList.add("govuk-!-font-weight-bold");
        if (window.getSelection) {
          var sel = window.getSelection();
          if (sel.rangeCount) {
            var range = sel.getRangeAt(0).cloneRange();
            range.surroundContents(bold);
            sel.removeAllRanges();
            sel.addRange(range);
          }
        }
        break;
    }
  });

  //tables
  $('.td .submit-edit').click(function(){
    var textupdate2 = $('.td #paragraph-text').html();
    $('.selected').html(textupdate2);
    $('.edit-element.td').hide();
    $('.elements').show('fast');
    savehtml();
    //accessibilityValidation();
  });
  $('.th .submit-edit').click(function(){
    var textupdate3 = $('.th #paragraph-text').html();
    $('.selected').html(textupdate3);
    $('.edit-element.th').hide();
    $('.elements').show('fast');
    savehtml();
    //accessibilityValidation();
  });
  $('.tr .submit-edit').click(function(){
    savehtml();
    //accessibilityValidation();
  });
  //button controls
  $('.p .submit-edit').click(function(){
    var textupdate = $('.p #paragraph-text').html();
    $('.selected').html(textupdate);
    $('.edit-element.p').hide();
    $('.elements').show('fast');
    savehtml();
    //accessibilityValidation();
  });

  //INPUT controls
  $('.input .submit-edit').click(function(){
    var inputName = $('.input-name').val();
    var inputValue = $('.input-value').val();
    var inputType = $('.input-type').val();
    //genrate data code from input name
    $(inputName).blur(function(){
      $('.get-use-data-code').text();
    });
    $('.selected').attr('name',inputName);
    $('.selected').attr('type',inputType);
    $('.selected').attr('value',inputValue);
    console.log(inputType + inputValue + inputName);
    $('.edit-element.input, .hide-conditions').hide();

    $('.elements').show('fast');
    savehtml();
    //accessibilityValidation();
  });
  $('.conditions').on('change', function(e){
    var conditiontarget = $(this).val();
    $('.selected').removeAttr('data-conditional-data');
    $('.selected').attr('data-conditional-data',conditiontarget);
  });

  var currentInputName = $('.selected').attr('name');
  $('#use-data').change(function() {
    var currentInputName = $('.selected').attr('name');
    if ($('#use-data').prop('checked')) {
      $('.selected').attr('data-use-data','use-data');
      $('.get-use-data-code p').text('[[['+currentInputName+']]]');
      $('.get-use-data-code').show();
    } else {
      $('.selected').attr('data-use-data','none');
      $('.get-use-data-code').hide();
      $('.get-use-data-code p').text("");
    }
  });

  $('.button .submit-edit').click(function(){
    $('.edit-element.button').hide();
    $('.elements').show('fast');
    e.preventDefault(e);
    savehtml();
    //accessibilityValidation();
  });
  $('.position-settings-panel').hide();
  $('.submit-edit').click(function(){
    $('.position-settings-panel').hide();
  })
  //add internal URL to link
  $('.internal-url').on('change', function(e){
    //alert('.selected href - '+$('.selected').attr('href'));
    window.internalURL = $(this).val();
    //alert('URL in option - '+ internalURL);
    $('.link-target').val(internalURL);
    $('.link .submit-edit').click(function(){
      window.linkTarget = $('.link-text').val();
      $('.selected').attr('href',internalURL);
      //alert(linkTarget);
      $('.edit-element.link').hide();
      $('.elements').show('fast');
      e.preventDefault(e);
      savehtml();
      //accessibilityValidation();
    });
    savehtml();
  });

  $('.link .submit-edit').click(function(e){
    window.linkTarget = $('.link-text').val();
    $('.selected').text($('.link-text').val());
    $('.selected').attr('class',$('.link-type').val());
    //alert(linkTarget);
    $('.edit-element.link').hide();
    $('.elements').show('fast');
    e.preventDefault(e);
    savehtml();
    //accessibilityValidation();
  });
  $('.heading .submit-edit').click(function(){
    $('.selected').text($('.heading-text').text());
    $('.edit-element.heading').hide();
    $('.elements').show('fast');
    savehtml();
    //accessibilityValidation();
  });
  //edit HTML
  $('.div .submit-edit').click(function(){
    $('.selected').html($('.edit-html').html());
    $('.edit-element.div').hide();
    $('.elements').show('fast');
    savehtml();
    //accessibilityValidation();
  });
  $('.label .submit-edit').click(function(){
    $('.selected').text($('.label-text').text());
    $('.edit-element.label').hide();
    $('.elements').show('fast');
    //accessibilityValidation();
  });
  $('.covert-to-link').click(function(){
    var buttonText = $('.selected').text();
    $('.selected').replaceWith('<a class="govuk-button" href="#">'+buttonText+'</a>')
  });
  //delete node
  $('.delete-edit').click(function(){
    if (confirm("Are you sure you want to delete this?") == true) {
        x = "You pressed OK!";
        $('.selected').remove();
        $('.edit-element').hide();
        $('.elements').show('fast');
    } else {
        x = "You pressed Cancel!";
    }
    savehtml();
  });
  //duplicate node
  $('.duplicate-edit').click(function(){
    var duplicate = $('.selected').clone();
    $('.selected').after(duplicate);
    $('.edit-element').hide();
    $('.elements').show('fast');
    savehtml();
  });

  $('.cancel-edit').click(function(){
    $('.edit-element').hide();
    $('.elements').show('fast');
    $('.hide-conditions, .position-settings-panel').hide();
  });

$('.add-elements').click(function(){
  addthiselement = $(this).data('element');
  $('.govuk-details__text').addClass('sortablelist connectedSortable');
  $(function() {
    var json = {
        "gds": {
            "header":'<header class="govuk-header " role="banner" data-module="govuk-header"> <div class="govuk-header__container govuk-width-container"> <div class="govuk-header__logo"> <a href="#" class="govuk-header__link govuk-header__link--homepage"> <span class="govuk-header__logotype"> <svg aria-hidden="true" focusable="false" class="govuk-header__logotype-crown" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 132 97" height="30" width="36"> <path fill="currentColor" fill-rule="evenodd" d="M25 30.2c3.5 1.5 7.7-.2 9.1-3.7 1.5-3.6-.2-7.8-3.9-9.2-3.6-1.4-7.6.3-9.1 3.9-1.4 3.5.3 7.5 3.9 9zM9 39.5c3.6 1.5 7.8-.2 9.2-3.7 1.5-3.6-.2-7.8-3.9-9.1-3.6-1.5-7.6.2-9.1 3.8-1.4 3.5.3 7.5 3.8 9zM4.4 57.2c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.5-1.5-7.6.3-9.1 3.8-1.4 3.5.3 7.6 3.9 9.1zm38.3-21.4c3.5 1.5 7.7-.2 9.1-3.8 1.5-3.6-.2-7.7-3.9-9.1-3.6-1.5-7.6.3-9.1 3.8-1.3 3.6.4 7.7 3.9 9.1zm64.4-5.6c-3.6 1.5-7.8-.2-9.1-3.7-1.5-3.6.2-7.8 3.8-9.2 3.6-1.4 7.7.3 9.2 3.9 1.3 3.5-.4 7.5-3.9 9zm15.9 9.3c-3.6 1.5-7.7-.2-9.1-3.7-1.5-3.6.2-7.8 3.7-9.1 3.6-1.5 7.7.2 9.2 3.8 1.5 3.5-.3 7.5-3.8 9zm4.7 17.7c-3.6 1.5-7.8-.2-9.2-3.8-1.5-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.3 3.5-.4 7.6-3.9 9.1zM89.3 35.8c-3.6 1.5-7.8-.2-9.2-3.8-1.4-3.6.2-7.7 3.9-9.1 3.6-1.5 7.7.3 9.2 3.8 1.4 3.6-.3 7.7-3.9 9.1zM69.7 17.7l8.9 4.7V9.3l-8.9 2.8c-.2-.3-.5-.6-.9-.9L72.4 0H59.6l3.5 11.2c-.3.3-.6.5-.9.9l-8.8-2.8v13.1l8.8-4.7c.3.3.6.7.9.9l-5 15.4v.1c-.2.8-.4 1.6-.4 2.4 0 4.1 3.1 7.5 7 8.1h.2c.3 0 .7.1 1 .1.4 0 .7 0 1-.1h.2c4-.6 7.1-4.1 7.1-8.1 0-.8-.1-1.7-.4-2.4V34l-5.1-15.4c.4-.2.7-.6 1-.9zM66 92.8c16.9 0 32.8 1.1 47.1 3.2 4-16.9 8.9-26.7 14-33.5l-9.6-3.4c1 4.9 1.1 7.2 0 10.2-1.5-1.4-3-4.3-4.2-8.7L108.6 76c2.8-2 5-3.2 7.5-3.3-4.4 9.4-10 11.9-13.6 11.2-4.3-.8-6.3-4.6-5.6-7.9 1-4.7 5.7-5.9 8-.5 4.3-8.7-3-11.4-7.6-8.8 7.1-7.2 7.9-13.5 2.1-21.1-8 6.1-8.1 12.3-4.5 20.8-4.7-5.4-12.1-2.5-9.5 6.2 3.4-5.2 7.9-2 7.2 3.1-.6 4.3-6.4 7.8-13.5 7.2-10.3-.9-10.9-8-11.2-13.8 2.5-.5 7.1 1.8 11 7.3L80.2 60c-4.1 4.4-8 5.3-12.3 5.4 1.4-4.4 8-11.6 8-11.6H55.5s6.4 7.2 7.9 11.6c-4.2-.1-8-1-12.3-5.4l1.4 16.4c3.9-5.5 8.5-7.7 10.9-7.3-.3 5.8-.9 12.8-11.1 13.8-7.2.6-12.9-2.9-13.5-7.2-.7-5 3.8-8.3 7.1-3.1 2.7-8.7-4.6-11.6-9.4-6.2 3.7-8.5 3.6-14.7-4.6-20.8-5.8 7.6-5 13.9 2.2 21.1-4.7-2.6-11.9.1-7.7 8.8 2.3-5.5 7.1-4.2 8.1.5.7 3.3-1.3 7.1-5.7 7.9-3.5.7-9-1.8-13.5-11.2 2.5.1 4.7 1.3 7.5 3.3l-4.7-15.4c-1.2 4.4-2.7 7.2-4.3 8.7-1.1-3-.9-5.3 0-10.2l-9.5 3.4c5 6.9 9.9 16.7 14 33.5 14.8-2.1 30.8-3.2 47.7-3.2z"></path> <image src="/assets/images/govuk-logotype-crown.png" xlink:href="" class="govuk-header__logotype-crown-fallback-image" width="36" height="32"></image> </svg> <span class="govuk-header__logotype-text"> GOV.UK </span> </span> </a> </div></div></header>',
            "footer":'<footer class="govuk-footer " role="contentinfo"> <div class="govuk-width-container "> <div class="govuk-footer__meta"> <div class="govuk-footer__meta-item govuk-footer__meta-item--grow"> <svg aria-hidden="true" focusable="false" class="govuk-footer__licence-logo" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 483.2 195.7" height="17" width="41"> <path fill="currentColor" d="M421.5 142.8V.1l-50.7 32.3v161.1h112.4v-50.7zm-122.3-9.6A47.12 47.12 0 0 1 221 97.8c0-26 21.1-47.1 47.1-47.1 16.7 0 31.4 8.7 39.7 21.8l42.7-27.2A97.63 97.63 0 0 0 268.1 0c-36.5 0-68.3 20.1-85.1 49.7A98 98 0 0 0 97.8 0C43.9 0 0 43.9 0 97.8s43.9 97.8 97.8 97.8c36.5 0 68.3-20.1 85.1-49.7a97.76 97.76 0 0 0 149.6 25.4l19.4 22.2h3v-87.8h-80l24.3 27.5zM97.8 145c-26 0-47.1-21.1-47.1-47.1s21.1-47.1 47.1-47.1 47.2 21 47.2 47S123.8 145 97.8 145"/> </svg> <span class="govuk-footer__licence-description"> All content is available under the <a class="govuk-footer__link" href="https://www.nationalarchives.gov.uk/doc/open-government-licence/version/3/" rel="license">Open Government Licence v3.0</a>, except where otherwise stated </span> </div><div class="govuk-footer__meta-item"> <a class="govuk-footer__link govuk-footer__copyright-logo" href="https://www.nationalarchives.gov.uk/information-management/re-using-public-sector-information/uk-government-licensing-framework/crown-copyright/">© Crown copyright</a> </div></div></div></footer>',
            "elements": [
              {
                "name": "h1",
                "markup": '<h1 class="govuk-heading-xl">Heading 1</h1>',
                "description": ""
              },
              {
                "name": "h2",
                "markup": '<h2 class="govuk-heading-l">Heading 2</h2>',
                "description": ""
              },
              {
                "name": "h3",
                "markup": '<h1 class="govuk-heading-m">Heading 3</h3>',
                "description": ""
              },
              {
                "name": "h4",
                "markup": '<h4 class="govuk-heading-s">Heading 4</h4>',
                "description": ""
              },
              {
                "name": "h5",
                "markup": '<h5 class="govuk-heading-s">Heading 5</h5>',
                "description": ""
              },
              {
                "name": "paragraph",
                "markup": '<p class="govuk-body">Paragraph</p>',
                "description": ""
              },
              {
                "name": "fieldset",
                "markup": '<fieldset class="govuk-fieldset"><div class="govuk-form-group sortablelist connectedSortable ui-sortable"></div></fieldset>',
                "description": ""
              },
              {
                "name": "radio",
                "markup": '<div class="govuk-radios__item"><input class="govuk-radios__input" id="changed-name" name="changed-name" type="radio" value="yes"><label class="govuk-label govuk-radios__label" for="changed-name">Yes</label></div>',
                "description": ""
              },
              {
                "name": "radio-group",
                "markup": '<div class="govuk-form-group"> <fieldset class="govuk-fieldset" aria-describedby="changed-name-hint"> <legend class="govuk-fieldset__legend govuk-fieldset__legend--l"> <h1 class="govuk-fieldset__heading"> Have you changed your name? </h1> </legend> <span id="changed-name-hint" class="govuk-hint"> This includes changing your last name or spelling your name differently. </span> <div class="govuk-radios govuk-radios--inline"> <div class="govuk-radios__item"> <input class="govuk-radios__input" id="changed-name" name="changed-name" type="radio" value="yes"> <label class="govuk-label govuk-radios__label" for="changed-name"> Yes </label> </div><div class="govuk-radios__item"> <input class="govuk-radios__input" id="changed-name-2" name="changed-name" type="radio" value="no"> <label class="govuk-label govuk-radios__label" for="changed-name-2"> No </label> </div></div></fieldset></div>',
                "description": ""
              },
              {
                "name": "select",
                "markup": '<select class="govuk-select" id="sort" name="sort"><option value="published">Recently published</option><option value="updated" selected>Recently updated</option><option value="views">Most views</option><option value="comments">Most comments</option></select>',
                "description": ""
              },
              {
                "name": "checkbox",
                "markup": '<div class="govuk-checkboxes__item"><input class="govuk-checkboxes__input" id="waste" name="waste" type="checkbox" value="carcasses"><label class="govuk-label govuk-checkboxes__label" for="waste">Label text</label></div>',
                "description": ""
              },
              {
                "name": "password",
                "markup": '<div class="govuk-form-group"><label class="govuk-label" for="event-name">Event name</label><input class="govuk-input" id="event-name" name="event-name" type="password"></div>',
                "description": ""
              },
              {
                "name": "email",
                "markup": '<div class="govuk-form-group"><label class="govuk-label" for="event-name">Event name</label><input class="govuk-input" id="event-name" name="event-name" type="email"></div>',
                "description": ""
              },
              {
                "name": "textfield",
                "markup": '<div class="govuk-form-group"><label class="govuk-label" for="event-name">Event name</label><input class="govuk-input" id="event-name" name="event-name" type="text"></div>',
                "description": ""
              },
              {
                "name": "textarea",
                "markup": '<textarea class="govuk-textarea" id="more-detail" name="more-detail" rows="5" aria-describedby="more-detail-hint"></textarea>',
                "description": ""
              },
              {
                "name": "date",
                "markup": '<div class="govuk-form-group"> <fieldset class="govuk-fieldset" role="group" aria-describedby="passport-issued-hint"> <legend class="govuk-fieldset__legend govuk-fieldset__legend--l"> <h1 class="govuk-fieldset__heading"> When was your passport issued? </h1> </legend> <span id="passport-issued-hint" class="govuk-hint"> For example, 12 11 2007 </span> <div class="govuk-date-input" id="passport-issued"> <div class="govuk-date-input__item"> <div class="govuk-form-group"> <label class="govuk-label govuk-date-input__label" for="passport-issued-day"> Day </label> <input class="govuk-input govuk-date-input__input govuk-input--width-2" id="passport-issued-day" name="passport-issued-day" type="text" pattern="[0-9]*" inputmode="numeric"> </div></div><div class="govuk-date-input__item"> <div class="govuk-form-group"> <label class="govuk-label govuk-date-input__label" for="passport-issued-month"> Month </label> <input class="govuk-input govuk-date-input__input govuk-input--width-2" id="passport-issued-month" name="passport-issued-month" type="text" pattern="[0-9]*" inputmode="numeric"> </div></div><div class="govuk-date-input__item"> <div class="govuk-form-group"> <label class="govuk-label govuk-date-input__label" for="passport-issued-year"> Year </label> <input class="govuk-input govuk-date-input__input govuk-input--width-4" id="passport-issued-year" name="passport-issued-year" type="text" pattern="[0-9]*" inputmode="numeric"> </div></div></div></fieldset></div>',
                "description": ""
              },
              {
                "name": "green-button",
                "markup": '<a href="" class="govuk-button">Button</a>',
                "description": ""
              },
              {
                "name": "secondary-button",
                "markup": '<a href="" class="govuk-button govuk-button--secondary">Button</a>',
                "description": ""
              },
              {
                "name": "red-button",
                "markup": '<a href="" class="govuk-button govuk-button--warning">Button</a>',
                "description": ""
              },
              {
                "name": "disabled-button",
                "markup": '<a href="" class="govuk-button govuk-button--disabled">Button</a>',
                "description": ""
              },
              {
                "name": "start-button",
                "markup": '<a href="" class="govuk-button govuk-button--start">Start   <svg class="govuk-button__start-icon" xmlns="http://www.w3.org/2000/svg" width="17.5" height="19" viewBox="0 0 33 40" aria-hidden="true" focusable="false"><path fill="currentColor" d="M0 0h13l20 20-20 20H0l20-20z" /></svg></a>',
                "description": ""
              },
              {
                "name": "details",
                "markup": '<details class="govuk-details" data-module="govuk-details"> <summary class="govuk-details__summary"> <span class="govuk-details__summary-text"> Help with nationality </span> </summary> <div class="govuk-details__text sortablelist connectedSortable"> We need to know your nationality so we can work out which elections you’re entitled to vote in. If you cannot provide your nationality, you’ll have to send copies of identity documents through the post. </div></details>',
                "description": ""
              },
              {
                "name": "breadcrumb",
                "markup": '<div class="govuk-breadcrumbs"><ol class="govuk-breadcrumbs__list"><li class="govuk-breadcrumbs__list-item"><a class="govuk-breadcrumbs__link" href="#">Home</a></li><li class="govuk-breadcrumbs__list-item"><a class="govuk-breadcrumbs__link" href="#">Passports, travel and living abroad</a></li><li class="govuk-breadcrumbs__list-item" aria-current="page">Travel abroad</li></ol></div>',
                "description": ""
              },
              {
                "name": "backlink",
                "markup": '<a href="#" class="govuk-back-link">Back</a>',
                "description": ""
              },
              {
                "name": "table",
                "markup": '<table class="govuk-table"><thead class="govuk-table__head"> <tr class="govuk-table__row"> <th scope="col" class="govuk-table__header sortablelist connectedSortable ui-sortable">Date</th> <th scope="col" class="govuk-table__header sortablelist connectedSortable ui-sortable">Amount</th> </tr></thead> <tbody class="govuk-table__body"> <tr class="govuk-table__row"> <th scope="row" class="govuk-table__header sortablelist connectedSortable ui-sortable">First 6 weeks</th> <td class="govuk-table__cell sortablelist connectedSortable ui-sortable">£109.80 per week</td></tr><tr class="govuk-table__row"> <th scope="row" class="govuk-table__header sortablelist connectedSortable ui-sortable">Next 33 weeks</th> <td class="govuk-table__cell sortablelist connectedSortable ui-sortable">£109.80 per week</td></tr><tr class="govuk-table__row"> <th scope="row" class="govuk-table__header sortablelist connectedSortable ui-sortable">Total estimated pay</th> <td class="govuk-table__cell sortablelist connectedSortable ui-sortable">£4,282.20</td></tr></tbody></table>',
                "description": ""
              },

          ]
        }
    };
    //$('#proto-header').html(json.gds.header);
    //$('#proto-footer').html(json.gds.footer);
    $.each(json.gds.elements, function(i, v) {
      if (v.name == addthiselement) {
        var jsonobject = v.markup;
        console.log(jsonobject);
        $('#canvas .activearea').append(jsonobject);
        $('.govuk-details__text').addClass('connectedSortable');
        $('#canvas button').addClass('connectedSortable');
        $(function() {

          $( ".sortablelist" ).sortable({
            connectWith: ".connectedSortable",
            receive: function(event, ui) {},
            update: function (event, ui) {
              savehtml();
              ////accessibilityValidation();
            },
            cancel: 'input,textarea,button,select,option',
          })
        });
        //accessibilityValidation();

        //this had to go here to stop default on buttons on canvas
        $('.govuk-button, #canvas a').on('click', function (e) {
          e.preventDefault(e);
        });
        $('#canvas textarea').prop('disabled',true);
        //make stuff grad and droppable
        $('.govuk-grid-column-two-thirds, .conditional-how-contacted-conditional, .govuk-grid-column-two-thirds, .govuk-grid-column-one-third').on('each', function(){
          $(this).addClass('sortablelist').addClass('ui-sortable').addClass('connectedSortable');
          $(this).first().addClass('ui-state-defadivt');
        });
        $('.sortable *').on('each',function(){
          $(this).addClass('ui-state-defadivt');
        });
        $('td, th').on('each', function(){
          $(this).addClass('ui-sortable').addClass('connectedSortable');
        });
        savehtml();
        getClasses();

        return;
      }
    });
  });
  //modal stuff
});
$('#new-pattern').on('click', function(e){
  $('.html-modal').modal('show');
});
$('.ui.green.button').on('click', function(e){
  var newhtml = $('.html-modal textarea').val();
  console.log(newhtml);
  $('.activearea').append(newhtml);
  $('.html-modal').modal('hide');
  $('td, th').addClass('ui-sortable').addClass('connectedSortable');
  savehtml();
  $('.html-modal textarea').val('').text('');
});
$('.govuk-button, #canvas a').on('click', function (e) {
  e.preventDefault();
});
//menu accordian
$('.ui.accordion').accordion();

//$('.positionsetting').blur(function(){
  $('.submit-edit').on('click',function(){
    //alert('hits');
    var margTop = $('#margin-top').val();
    if (margTop > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-top-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-top-'+margTop);
    }
    var margRight = $('#margin-right').val();
    if (margRight > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-right-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-right-'+margRight);
    }
    var margBottom = $('#margin-bottom').val();
    if (margBottom > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-bottom-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-bottom-'+margBottom);
    }
    var margLeft = $('#margin-left').val();
    if (margLeft > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-margin-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-margin-left-'+margLeft);
    }
    var padtop = $('#padding-top').val();
    if (padtop > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+margLeft);
    }
    var padRight = $('#padding-right').val();
    if (padRight > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+padRight);
    }
    var padBottom = $('#padding-bottom').val();
    if (padBottom > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+padBottom);
    }
    var padLeft = $('#padding-left').val();
    if (padLeft > 0) {
      $(".selected").removeClass (function (index, className) {
        return (className.match (/\bgovuk-!-padding-left-\S+/g) || []).join(' ');
      });
      $(".selected").addClass('govuk-!-padding-left-'+padLeft);
    }
    savehtml();
  });
//});


///

//add layout
$(document).on('click','.layout1', function(){
//$('.layout1').on('click',function(){
  $('#canvas').append('<div class="govuk-grid-row"><div class="govuk-grid-column-full sortablelist connectedSortable ui-sortable"></div></div>');
  $(".sortablelist").sortable( "refresh" );
  savehtml();
});
$(document).on('click','.layout2', function(){
//$('.layout2').on('click',function(){
  $('#canvas').append('<div class="govuk-grid-row"><div class="sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds"></div><div class="sortablelist connectedSortable ui-sortable govuk-grid-column-one-third"></div></div>');
  $(".sortablelist").sortable( "refresh" );
  savehtml();
});
$(document).on('click','.layout3', function(){
//$('.layout3').on('click',function(){
  $('#canvas').append('<div class="govuk-grid-row"><div class="govuk-grid-column-one-third sortablelist connectedSortable ui-sortable"></div><div class="sortablelist connectedSortable ui-sortable govuk-grid-column-two-thirds"></div>');
  $(".sortablelist").sortable( "refresh" );
  savehtml();
});
$(document).on('click','.layout4', function(){
//$('.layout4').on('click',function(){
  alert('Layout 4');
  $('#canvas').append('<div class="govuk-grid-row"><div class="govuk-grid-column-one-third sortablelist connectedSortable ui-sortable"></div><div class="govuk-grid-column-one-third sortablelist connectedSortable ui-sortable"></div><div class="govuk-grid-column-one-third sortablelist connectedSortable ui-sortable"></div></div>');
  $(".sortablelist").sortable( "refresh" );
  savehtml();
});

</script>
<script src="theme/govuk-frontend.js"></script>

</html>
