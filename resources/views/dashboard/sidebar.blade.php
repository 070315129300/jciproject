<section class="sidebar">
    @if(Auth::user()->id == $admin->id)
    <img
        src="img/junior-chamber-international-squarelogo-1432651524345-removebg-preview.png"
        alt="logo"
        class="logo"
    />
    <div class="account">
        <div class="pfp">
            <img
                src="img/Portland Black Male Headshots — Photography for Business Owners — Portland, OR — Natalie Kristeen.jpeg"
                alt="profile"
            />
        </div>
        <p>{{$admin->firstname}}</p>
    </div>
    <hr />
    <div class="links">
        <a href="alluser">All Members</a>
        <a href="adduser">Add New Members</a>
        <a href="addadmin">Add an Admin</a>
        <a href="alladmin">ALL Admin</a>
    </div>

    <div class="logout"><i class="fa-solid fa-arrow-left"></i> <a href="logout">Logout</a></div>

    <div class="design">
        <p>Designed by:</p>
    </div>
        @endif
</section>
