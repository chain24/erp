<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name=“viewport” content=“width=device-width; initial-scale=1.0”>
<meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
<title>superbiiz Erp管理</title>
<style type="text/css">
</style>
   <link href="<?php echo e(url('/')); ?>/css/bootstrap.css" rel="stylesheet">
   <script src="<?php echo e(url('/')); ?>/js/jquery-2.2.0.js"></script>
   <script src="<?php echo e(url('/')); ?>/js/bootstrap.js"></script>


<style>
.coolbg {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
	background:#eee;
    border-color: -moz-use-text-color #acacac #acacac -moz-use-text-color;
    border-image: none;
    border-style: none solid solid none;
    border-width: medium 1px 1px medium;
    cursor: pointer;
    padding: 2px 5px;
	color:#000;
	margin-left:10px;

}

.search-form > .search-pane button[type="submit"] {
    background: #368ee0 none repeat scroll 0 0;
    border: 0 none;
    color: #fff;
    float: right;
    line-height: 19px;
    margin: 2px 2px 0 0;
    min-height: 24px;
}

.fa {
    display: inline-block;
    font-family: FontAwesome;
    font-feature-settings: normal;
    font-kerning: auto;
    font-language-override: normal;
    font-size: inherit;
    font-size-adjust: none;
    font-stretch: normal;
    font-style: normal;
    font-synthesis: weight style;
    font-variant: normal;
}
 .sidebar {

    
    bottom: 0;
    display: block;
    left: 0;
    overflow-x: hidden;
    overflow-y: auto;
   

    position: fixed;
    top: 51px;
    z-index: 1000;}

.pagination li{
float:left;
margin:0 10px;
}
.category_sub button:hover{background-color:#eFeFeF !important;
 }
.btn_submit button:hover{background-color:#448ED9 !important;
}
.chang_button>button:hover{
	background-color:#DB3C3C !important;
}


.chang_button>button+button:hover{
	background-color:#4B963D !important;
}
.btn_table button:hover { 
	background-color:#4B963D !important;
	
}
@media  screen and (max-width:768px) {

	.nav_side{display:none;}
}



</style>


</head>

<body >