<!DOCTYPE html>
<html>
<head>
<style>
#hydrant {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#hydrant td, #hydrant th {
  border: 1px solid #ddd;
  padding: 8px;
}

#hydrant tr:nth-child(even){background-color: #f2f2f2;}


#hydrant th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #6B66F5;
  color: white;
}
</style>
</head>
<body>

<h1>List of Fire Hydrants</h1>
<div>
    <p>{{  now()->toDateTimeString() }}</p>
</div>

<table id="hydrant">
				<thead>
					<tr>
                        <th>ID</th>
                        <th>Address</th>
                        <th>Longitude</th>
                        <th>Latitude</th>
                        <!-- <th>Hydrant Type</th> -->
                        <th>Status</th>
                        <th>Created At</th>
					</tr>
				</thead>
				<tbody>
				@foreach($firehydrants as $firehydrant)
					<tr>
						<td>{{$firehydrant->hydrant_id}}</td>
						<td>{{$firehydrant->address}}</td>
						<td>{{$firehydrant->longitude}}</td>
                        <td>{{$firehydrant->latitude}}</td>
						<!-- <td>{{$firehydrant->hydrant_type_id}}</td> -->
						<td>{{$firehydrant->status}}</td>
                        <td>{{$firehydrant->created_at}}</td>
					</tr>
                    <tr>	
				</tbody>
				@endforeach
			</table>

</body>
</html>


