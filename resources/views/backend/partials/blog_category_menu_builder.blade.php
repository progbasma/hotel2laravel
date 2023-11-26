
<li>
	<label class="checkbox-title">
		<input type="checkbox" class="blog-category-menu-item" name="blog-category-menu-item" value="0">{{ __('Blog') }}
	</label>
</li>
@foreach($blog_category_datalist as $row)
<li>
	<label class="checkbox-title">
		<input type="checkbox" class="blog-category-menu-item" name="blog-category-menu-item" value="{{ $row->id }}">{{ $row->name }}
	</label>
</li>
@endforeach
<div class="menu_pagination BlogCategoryMenuBuilder">
{{ $blog_category_datalist->links() }}
</div>