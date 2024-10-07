@extends('themes.layout.index')
@section('content')
   
  @foreach($modules as $module)
    
    @php
      $moduleIdContentMapping = [
        '1' => ['path' => 'themes.slider.index', 'check_null' => true],
        '2' => ['path' => null, 'check_null' => false], // HTML içerik için null path
        '3' => ['path' => 'themes.rooms.roomsList.homeList.carousel', 'check_null' => true],
        '4' => ['path' => 'themes.blogs.blogCategoryList.index', 'check_null' => true],
        '5' => ['path' => 'themes.rooms.roomsList.homeList.select', 'check_null' => true],
        '6' => ['path' => null, 'check_null' => false], // HTML içerik için null path
      ];
    @endphp

    @if(array_key_exists($module->moduleId, $moduleIdContentMapping))
      @php
        $mapping = $moduleIdContentMapping[$module->moduleId];
        if (in_array($module->moduleId, ['2', '6'])) {
          $shouldInclude = !empty($module->content); // Content varsa gösterilecek
        } else {
          $shouldInclude = $mapping['check_null'] ? is_null($module->content) : !is_null($module->content);
        }
      @endphp

      @if($shouldInclude)
        @if(in_array($module->moduleId, ['2', '6']))
          {!! $module->content !!}  <!-- Content HTML olarak ekleniyor -->
        @else
          @include($mapping['path'])
        @endif
      @endif
    @endif
  @endforeach

@endsection
