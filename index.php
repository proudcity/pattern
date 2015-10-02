<?php include_once('functions.php'); ?>
<?php 
$project_name = "ProudCity Pattern Library";
$version = !empty($_GET['v']) ? $_GET['v'] : FALSE;
if ($version == 'local') {
  $css = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
          <link rel="stylesheet" href="http://localhost:9000/css/app.css">
          <link rel="stylesheet" href="http://localhost:9000/css/patternlibrary.css">
          <link rel="stylesheet" href="http://localhost:9000/css/proud-toolbar.css">'; 
}
elseif ($version) {
  $css = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
          <link rel="stylesheet" href="http://'.$version.'.getproudcity.com/css/libraries.min.css">
          <link rel="stylesheet" href="http://'.$version.'.getproudcity.com/css/app.min.css">
          <link rel="stylesheet" href="http://'.$version.'.getproudcity.com/css/patternlibrary.min.css">
          <link rel="stylesheet" href="http://'.$version.'.getproudcity.com/css/proud-toolbar.min.css">'; 
}
else {
  $css = '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
          <link rel="stylesheet" href="css/custom.css">
          <link rel="stylesheet" href="css/patternlibrary.css">
          <link rel="stylesheet" href="css/proud-toolbar.css">'; 
}
?>
<!DOCTYPE html>
<html class="menu-option-footer<?php print empty($_GET['page']) ? ' navbar-force-static' : ' topnav' ?>">
<head>
<meta charset="utf-8">
<title><?php echo($project_name)?></title>
<meta name="viewport" content="width=device-width">
<!-- Style Guide Boilerplate Styles -->
<link rel="stylesheet" href="//select2.github.io/select2/select2-3.5.1/select2.css">
<?php print $css; ?>

</head>
<body data-spy="scroll" data-target=".navbar-default" data-offset="60" >


<div class="row-offcanvas row-offcanvas-left">

  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
    <ul class="nav nav-pills nav-stacked sg-sect sg-menu">
      <?php listElementsAsOptions('docs'); ?>
      <?php listElementsAsOptions('foundation'); ?>
      <li role="presentation" class="divider"></li>
      <li role="presentation" class="dropdown-header">Base Styles</li>
      <?php listMarkupAsOptions('base'); ?>
      <li role="presentation" class="divider"></li>
      <li role="presentation" class="dropdown-header">Patterns</li>
      <?php listMarkupAsOptions('patterns'); ?>
      <li role="presentation" class="divider"></li>
      <li role="presentation" class="dropdown-header">Content</li>
      <?php listMarkupAsOptions('content'); ?>
      <li role="presentation" class="divider"></li>
      <li role="presentation" class="dropdown-header">Full Layouts</li>
      <?php listMarkupAsOptions('layouts', TRUE); ?>
    </ul>
  </div>

  <!-- Fixed navbar -->
  <div class="navbar navbar-default navbar-fixed-top navbar-patternlibrary" role="navigation">
    <div class="navbar-form pull-right">
      <button type="button" class="btn btn-primary" data-toggle="offcanvas"><i class="fa fa-bars"></i></button>
    </div>
    <div class="navbar-header">
      <a class="navbar-brand" href=""><img class="logo" src="http://www.getproudcity.com/images/logo.png" alt="Home" style="height: 30px;"></a>
      <a class="navbar-brand" href=""><?php echo($project_name)?></a>
    </div>
  </div>
  <!--/.sg-header-->
  
  <?php if (empty($_GET['page'])): ?>

    <div class="jumbotron"><div class="container">
      <h1><?php print $project_name ?></h1>
    </div></div>
    

    <div class="sg-body sg-container container">
      <?php showDocs(); ?>
      <!--/.row-->
      <div class="row">
        <h1 class="page-header">Foundation</h1>
        <?php showFoundation(); ?>
      </div>
      <!--/.row-->

      <div class="row sg-base-styles">
      <h1 class="page-header">Base Styles</h1>
      <?php showMarkup('base'); ?>
      </div><!--/.sg-base-styles-->
      <div class="sg-pattern-styles">
        <h1 class="page-header">Patterns<small> - Design and mark-up patterns unique to your site.</small></h1>
        <?php showMarkup('patterns'); ?>
      </div>
      <!--/.sg-pattern-styles-->
      <div class="sg-layout-styles">
        <h1 class="page-header">Layouts<small> - Content teasers and view modes.</small></h1>
        <?php showMarkup('content'); ?>
      </div>
      <!--/.sg-layout-styles-->

    </div>

  <?php else: ?>
    <?php 

      //Admin pages
      $pageReq = $_GET['page'];
      if(strpos($pageReq, 'admin') === false) {
        showMarkupItem('patterns', 'navbar');
      }
      
      showMarkupPage('layouts', $pageReq);

      if(strpos($pageReq, 'admin') === false) {
        showMarkupItem('patterns', 'footer');
      }
    ?>

  <?php endif; ?>


</div> <!-- row row-offcanvas row-offcanvas-left -->

<!-- fake search / answers sections -->

<div id="search-bg" ng-if="searchActive" ng-click="searchClose()">
  <form class="form-inline get-started search-form align-{{settings.header.searchAlign}}" id="wrapper-search" ng-class="{'search-active': searchActive}">
    <autocomplete ng-model="yourchoice" data="movies" on-type="updateMovies"></autocomplete>
    <div class="input-group">
      <input id="search-input" class="form-control input-lg" type="text" placeholder="How may we help you?" ng-focus="searchFocus()" ng-keypress="searchAutocomplete()" />
      <span class="input-group-btn">
        <button type="submit" value="Go" class="btn btn-primary btn-lg" ng-click="modal();"><i class="fa fa-search"></i></button>
      </span>
    </div>
    <ul class="search-autosuggest ng-scope" ng-if="searchActive"><!-- ngRepeat: item in autocomplete --><li class="ng-scope" ng-repeat="item in autocomplete"><a href="" ng-click="searchAutocompleteClick(item)" class="ng-binding"><i class="fa fa-usd"></i> Pay my water bill</a></li><!-- end ngRepeat: item in autocomplete --><li class="ng-scope" ng-repeat="item in autocomplete"><a href="" ng-click="searchAutocompleteClick(item)" class="ng-binding"><i class="fa fa-question-circle"></i> How do I get a marriage license?</a></li><!-- end ngRepeat: item in autocomplete --><li class="ng-scope" ng-repeat="item in autocomplete"><a href="" ng-click="searchAutocompleteClick(item)" class="ng-binding"><i class="fa fa-usd"></i> Pay a parking ticket</a></li><!-- end ngRepeat: item in autocomplete --><li class="ng-scope" ng-repeat="item in autocomplete"><a href="" ng-click="searchAutocompleteClick(item)" class="ng-binding"><i class="fa fa-question-circle"></i> How do I get a copy of a birth certificate?</a></li><!-- end ngRepeat: item in autocomplete --><li class="ng-scope" ng-repeat="item in autocomplete"><a href="" ng-click="searchAutocompleteClick(item)" class="ng-binding"><i class="fa fa-exclamation-triangle"></i> File a complaint</a></li><!-- end ngRepeat: item in autocomplete --></ul>
  </form>
  <a href="" ng-click="searchClose()" class="search-close" ng-if="searchActive"><i class="fa fa-times fa-2x"></i></a>
</div>
<div id="search-311" ng-if="searchActive" ng-click="searchClose()">
  <div class="app">
    <img src="/images/imagedemo.jpg" />
  </div>
  <a href="" ng-click="searchClose()" class="search-close" ng-if="searchActive"><i class="fa fa-times fa-2x"></i></a>
</div>

<!-- END fake search / answers sections -->

<!--/.sg-body-->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
  $(function() {
    $( ".datepicker" ).datepicker();
  });
</script>
<script src="js/scrollspy.js"></script>
<script src="js/dropdown.js"></script>
<script src="js/offcanvas.js"></script>
<script src="js/affix.js"></script>
<script src="js/collapse.js"></script>
<script src="js/tab.js"></script>
<script src="//select2.github.io/select2/select2-3.5.2/select2.js"></script>
<script src="js/sg-plugins.js"></script>
<script src="js/sg-scripts.js"></script>

</body>
</html>
