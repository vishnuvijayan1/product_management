<script type="text/javascript">
    var category_data = [
        @foreach($categories as $key => $category)
        {
            "id": "{{ $category->id }}",
            "parent": "{{ ($category->parent_id) ? $category->parent_id : '#' }}",
            "text": "{{ $category->getCategoryName() }}",
            "state": {
                "opened": true,
                @if($category->sub_categories()->count())

                @else
                    @if(in_array($category->id, $assigned_category_ids))
                    "selected": true,
                    @else
                    "selected": false,
                    @endif
                @endif

            }
        },
        @endforeach
    ];
    createCategoryTree(category_data);
</script>
