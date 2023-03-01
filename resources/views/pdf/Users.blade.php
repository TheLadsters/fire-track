<!DOCTYPE html>
<html>
<head>
<style>
#users {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#users td, #users th {
  border: 1px solid #ddd;
  padding: 8px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}


#users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #6B66F5;
  color: white;
}
</style>
</head>
<body>

<h1>List of Users</h1>
<div>
    <p>{{  now()->toDateTimeString() }}</p>
</div>

<table id="users">
				<thead>
					<tr>
						<th style="font-weight: bold;">Username</th>
						<th style="font-weight: bold;">Name</th>
						<th style="font-weight: bold;">Email</th>
						<th style="font-weight: bold;">Mobile No.</th>
						<th style="font-weight: bold;">Address</th>
						<th style="font-weight: bold;">Role</th>
                        <th style="font-weight: bold;">Status</th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->username}}</td>
						<td>{{$user->fname}} {{$user->lname}}</td>
						<td>{{$user->email}}</td>
                        <td>{{$user->contact_no}}</td>
						<td>{{$user->address}}</td>
						<td>{{$user->role}}</td>
                        <td>{{$user->status}}</td>
					</tr>
                    <tr>	
				</tbody>
				@endforeach
			</table>



            
</body>
</html>


