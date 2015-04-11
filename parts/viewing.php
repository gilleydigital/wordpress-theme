<?php
	global $wp_query,$posts;
	
	if (is_category())
	{
		echo single_cat_title('',false);
	}
	elseif (is_tag())
	{
		echo 'All content related to <strong>'.single_tag_title('',false).'</strong>';
	}
	elseif (is_search())
	{
		echo 'Results for <em>'.get_search_query().'</em>';
	}
	elseif (is_author() and isset($posts[0]))
	{
		echo 'All posts by '.get_the_author_meta('display_name', $posts[0]->post_author);
	}
	elseif (is_post_type_archive() and isset($posts[0]))
	{
		echo ucwords($posts[0]->post_type).'s';
	}
	elseif (is_tax())
	{
		if (isset($wp_query->tax_query) and $wp_query->tax_query and $wp_query->tax_query->queries)
		{
			foreach ($wp_query->tax_query->queries as $query){
				echo '<strong>'.esc_html($query['terms']).'</strong> archive';
				break;
			}
		}
		else{
			echo 'Archives';
		}
	}
	elseif (is_day())
	{
		echo 'Archives for <strong>'.get_the_date().'</strong>';
	}
	elseif (is_month())
	{
		echo 'Archives for <strong>'.get_the_date('F Y').'</strong>';
	}
	elseif (is_year())
	{
		echo 'Archives for <strong>'.get_the_date('Y').'</strong>';
	}
	else
	{
		echo 'Archives';
	}
	
	// Page Number
	if (isset($wp_query->query_vars['paged']) and isset($wp_query->max_num_pages) and $wp_query->max_num_pages > 1) 
	{
		echo ' <span class="page">Page '.max(1,$wp_query->query_vars['paged']).' of '.$wp_query->max_num_pages.'</span>';
	}
?>