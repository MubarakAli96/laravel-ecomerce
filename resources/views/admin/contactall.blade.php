@extends('admin.layouts.main')
@section('main')
<div class="page-wrapper">
  <div class="page-content">
    <h6 class="mb-0 text-uppercase">Contacts Derials</h6>
    <hr />
    <div class="card">
      <div class="card-body">
        <table class="table mb-0">
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Subject</th>
              <th scope="col">PhoneNo</th>
              <th scope="col">Message</th>
            </tr>
          </thead>
          <tbody>
            @foreach($contacts as $key=> $contact)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$contact->name}}</td>
              <td>{{$contact->email}}</td>
              <td>{{$contact->subject}}</td>
              <td>{{$contact->phone_no}}</td>
              <td>{{$contact->message}}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>




@endsection