<h3>A new project waiting for your confirmation: </h3>
<br>
<p>Project Service ID: {{ $id }}</p>
<p>Project Name: {{ $project_name }}</p>
<p>Customer Name: {{ $user_name }}</p>
<p>Customer Email: {{ $user_email }}</p>
<p>Service ID: {{ $service_id }}</p>
<p>Service Name: {{ $service_name }}</p>
<br>
<p>Click <a href="{{ route('vendor.projects.edit', ['project_service' => $id]) }}">here</a> to confirm or decline the project.</p>