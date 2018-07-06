@extends('layouts.app')

@section('content')
<div class="container">
  <ng-view></ng-view>
</div>                    
@endsection
@section('javascript')
<script type="text/javascript">
  angular.module('todomvc').value('apiToken', '<?php echo $apiToken ?>');
</script>
@stop