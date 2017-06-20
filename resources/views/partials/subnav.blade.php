<nav class="navbar navbar-default subnav" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li class="{{ set_active_route('home') }}"><a href="{{ route('home') }}">Tableau de bord</a></li>
				<li class="{{ set_active_route('posts.index') }}"><a href="{{ route('posts.index') }}">Pages</a></li>
				<li class=""><a href="{{ route('posts.index') }}">Articles</a></li>
				<li class=""><a href="#">Evenements</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>