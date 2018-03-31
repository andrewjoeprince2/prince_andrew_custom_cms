		<header>
			<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="admin_index.php">Evil Corp Movies</a></h1>
    </li>

    <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
  </ul>

  <section class="top-bar-section">

    <ul class="right">
			<li><a href="admin_movies.php">Manage Movies</a></li>
			<li><a href="admin_edituser.php">Edit Profile</a></li>
			<li><a href="admin_createuser.php">Create User</a></li>
			<li><a href="admin_deleteuser.php">Manage Users</a></li>
      <li class="has-dropdown">
        <a href="#"><?php echo $_SESSION['user_name']; ?></a>
        <ul class="dropdown">
          <li><a href="#">Settings</a></li>
          <li><a href="admin_edituser.php">Edit Profile</a></li>
					<li><a href="admin_createuser.php">Create User</a></li>
					<li><a href="admin_deleteuser.php">Manage Users</a></li>
        </ul></li>
				<li><a href="phpscripts/caller.php?caller_id=logout">Sign Out</a></li>
      </li>
    </ul>

    <!-- Left Nav Section -->
    <ul class="left">
      <li><a href="#">Client Dashboard</a></li>
    </ul>
  </section>
</nav>
		</header>
