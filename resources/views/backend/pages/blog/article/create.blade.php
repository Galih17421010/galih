@extends('backend.index')
@section('title','Create Article')
@section('css')
    <link rel="stylesheet" href={{asset("assets/css/typography.css")}} class="template-customizer-core-css" />
@endsection
@section('content')
<div class="col-12">
    <div class="card">
      <h5 class="card-header">Full Editor</h5>
      <div class="card-body">
        <div id="full-editor">
          <h6>Quill Rich Text Editor</h6>
          <p> Cupcake ipsum dolor sit amet. Halvah cheesecake chocolate bar gummi bears cupcake. Pie macaroon bear claw. Soufflé I love candy canes I love cotton candy I love. </p>
        </div>
      </div>
    </div>
</div>
@endsection

