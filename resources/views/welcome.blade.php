
{{-- @extends('shopify-app::layouts.default') --}}
@extends('layouts.master')

@section('content')
<strong><a href="{{ URL::tokenRoute('groups.index') }}">Create Groups</a></strong>
@endSection