@extends('customer.layouts.master')

@section('content')
@php( $owners = DB::table('users')->get())

<select class="form-control" name="owner_name" id="owner_name">
    @foreach($owners as $contact)
      <option value="{{ $contact->nama }}">{{ $contact->nama }}</option>
    @endforeach
</select>
@endsection
