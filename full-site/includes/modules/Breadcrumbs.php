<?php
function Breadcrumbs()
{ 
	GLOBAl $mes,$LANG,$len_default,$SETPAGE;
		
	$setPages = array_diff(explode("/",  $_SERVER['REQUEST_URI']), array('')); 

	if ($LANG!=$len_default) 
	{
		array_shift($setPages);
	}

	if ($SETPAGE!='index')
	{
		$Breadcrumbs[]=['url'=>UrlAdd('',1),'text'=>$mes['Главная']];
	}

	
	
	switch($SETPAGE)
	{
			case ('floor'):
				
				$Breadcrumbs[]=['url'=>UrlAdd('plan',1),'text'=>$mes['houses-h1']];
				$Breadcrumbs[]=['url'=>UrlAdd(implode("/", $setPages),1), 'text'=>BreadcrumbsFloor];			
			break;
			
			case ('flats'):
			
				$end=array_pop ($setPages);
				
			  	$Breadcrumbs[]=['url'=>UrlAdd('plan',1),'text'=>$mes['houses-h1']];
				$Breadcrumbs[]=['url'=>UrlAdd(implode("/", $setPages),1), 'text'=>BreadcrumbsFloor];	
				$Breadcrumbs[]=['url'=>UrlAdd(implode("/", $setPages),1).'/'.$end, 'text'=>BreadcrumbsFlat];
			break;
			
			case ('news_list'):
			  	$Breadcrumbs[]=['url'=>UrlAdd('news',1),'text'=>$mes['news-h1']];
				$Breadcrumbs[]=['url'=>UrlAdd(implode("/", $setPages),1), 'text'=>BreadcrumbsNews];
			break;
			
			default:
			
				$url='';
				
				foreach ($setPages as $page)
				{
					if (!empty($url))
					{
						$url.='/';
					}	
					$url.=$page;

					$Breadcrumbs[]=['url'=>UrlAdd($url,1),'text'=>$mes[$page.'-h1']];
				}
	}
	
	return $Breadcrumbs;
}