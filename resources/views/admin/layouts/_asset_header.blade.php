<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{asset('assets/boots/css/mystyle.css')}}">
<style>
  /* Style the dropdown button */
.dropbtn {
    background-color: #3498db;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
    cursor: pointer;
  }
  
  /* Style the dropdown content (hidden by default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  /* Style the links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  /* Change color of dropdown links on hover */
  .dropdown-content a:hover {
    background-color: #3498db;
    color: white;
  }
  
  /* Show the dropdown content on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }
   </style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    /* Add your custom styles here */
    .hoverable {
      transition: background-color 0.3s ease;
    }

    .hoverable:hover {
      background-color: #565e66; /* Change to your desired hover background color */
      color: white;
    }
    body{
      font-family: 'EB Garamond', serif;
    }

    .nav{
      font-family: 'EB Garamond', serif;
    }

    .kop{
      font-family: 'EB Garamond', serif;
    }

    .highlighted-row {
    background-color: red !important; /* Use !important only if necessary to override other styles */
}
    
  </style>

