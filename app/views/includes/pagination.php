<?php
			$itemsPerPage = 3;
			$totalItems = $data['data']['count'];
			$pages = $totalItems/$itemsPerPage;
			$pages = ceil($pages);
			$pages = (int) $pages;
			$pager =  "<nav aria-label='Page navigation'>";
        	$pager .= "<ul class='pagination'>";
			$pager .= "<li style='padding-left:5px'><a href='report?pageNumber=1&itemsPerPage=".$itemsPerPage."'>First</a></li>";
        	for($i=2; $i<=$pages-1; $i++) {
        	$pager .= '<li style="padding-left:5px"><a href="report?pageNumber='.$i.'&itemsPerPage='.$itemsPerPage.'">'. $i .' </a></li>';
        	}
        	$pager .= "<li style='padding-left:5px'><a href='report?pageNumber=". $pages ."&itemsPerPage=".$itemsPerPage."'>Last</a></li>";
        	$pager .= "</ul>";
        	echo $pager;
?>