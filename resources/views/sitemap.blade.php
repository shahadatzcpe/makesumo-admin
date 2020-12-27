<h2>Set links</h2>
@foreach(\App\Models\AssetSet::orderBy('asset_type')->get() as $asset)
    <a target="_blank" href="{{ $asset->url }}">{{ $asset->url }}</a><br>
@endforeach

<h2>Item links</h2>
@foreach(\App\Models\Item::orderBy('asset_type')->get() as $item)
    <a target="_blank" href="{{ $item->url }}">{{ $item->url }}</a><br>
@endforeach

@foreach(\App\Models\Tag::all() as $tag)
    <a target="_blank" href="{{ route('frontend.search.result', ['search' => $tag->name]) }}">{{ route('frontend.search.result', ['search' => $tag->name]) }}</a><br>
@endforeach

