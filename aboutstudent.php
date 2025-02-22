<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="about.css">
    <link rel="icon" href="favicon.png" type="image">
	
</head>
<body>
    <!---navigation & searchbar-->
    <div class="navbar">
        <div class="icon">
			<span style="font-size:30px;cursor:pointer;color:rgb(13, 184, 236);" onclick="openNav()">&#9776;</span>
            <h2 class="logo1">Org-anizer</h2>
        </div>
        <div class="navigation-links">
        	<div class="searchbar">
            	<form action="/search" method="GET">
                <input type="text" name="q" placeholder="Search...">
                <button type="submit">Search</button>
            	</form>
       		 </div>
       		 <div class="about">
           		 <a href="about.php"><h2>ABOUT</h2></a>
        	</div>
    	</div>
    </div>
	
	<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="profilestudent.php">Profile</a>
                    <a href="dashboardstudent.php">Dashboard</a>
                    <a href="viewevents.php">View&nbsp;Events</a>
                    <a href="loginstudent.php">Logout</a>
    </div>

    <div class="mv">
    <h2>Mission:</h2>
    <h3>
        "At Adamson University, we strive to empower student organizations by offering a dynamic Event Scheduler platform.<br>
        Our goal is to streamline event planning, foster collaboration, and ensure every student group can effortlessly plan,<br>
        organize, and execute successful events, contributing to a thriving and inclusive university community."<br>
    </h3>

    <h2>Vision:</h2>
    <h3>
        "We aspire for the Event Scheduler at Adamson University to be the central hub for seamless event planning, catalyzing a <br> 
         connected campus community. Prioritizing accessibility, collaboration, and efficiency, our goal is to be an integral part<br>
          of the university experience, empowering student leaders to create impactful and vibrant events that contribute to a rich <br>
          tapestry of diversity."
    </h3>
</div>
	


    <script src="dashboard.js"></script>
</body>
</html>
