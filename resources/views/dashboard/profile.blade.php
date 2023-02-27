<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="{{url('style/sidebar.css')}}" />
    <link rel="stylesheet" href="{{url('style/profile.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />

</head>
<body>
<section class="sidebar">
    <img
        src="{{url('img/junior-chamber-international-squarelogo-1432651524345-removebg-preview.png')}}"
        alt="logo"
        class="logo"
    />
    <div class="account">
        <div class="pfp">
            <img
                src="{{url('img/Portland Black Male Headshots — Photography for Business Owners — Portland, OR — Natalie Kristeen.jpeg')}}"
                alt="profile"
            />
        </div>
        <p>Okokobioko</p>
    </div>
    <hr />
    <div class="links">
        <a href="{{url('alluser')}}">All Members</a>
        <a href="{{url('adduser')}}">Add New Members</a>
        <a href="{{url('addadmin')}}">Add an Admin</a>
        <a href="{{url('alladmin')}}">ALL Admin</a>
    </div>

    <div class="logout"><i class="fa-solid fa-arrow-left"></i> <a href="logout">Logout</a></div>

    <div class="design">
        <p>Designed by:</p>
    </div>
</section>
<main>
    <section class="header">
        <h2>MEMBER INFORMATION</h2>
        <i class="fa-solid fa-bars fa-lg" id="menu-icon"></i>
        <div class="res-menu">
            <ul>
                <li><a href="./members.html">All Members</a></li>
                <li><a href="./add-new-members.html">Add New Members</a></li>
                <li><a href="./add-an-admin.html">Add an Admin</a></li>
            </ul>
        </div>
    </section>
    <section class="personal">


        <img
            src="{{url('jciimage')}}/{{$user->image}}"
            alt="Profile Picture"
            class="profile-img"
        />
        <div class="info">
            <p><i class="fa-solid fa-user"></i> {{$user -> firstname}} {{$user -> lastname}}</p>
            <p><i class="fa-solid fa-envelope"></i> {{$user -> pemail}}</p>
        </div>
        <div class="info">
            <p><i class="fa-solid fa-phone"></i> {{$user -> phone}}</p>
            <p><i class="fa-solid fa-venus-mars"></i> {{$user -> gender}}</p>
        </div>
        <div class="info">
            <p><i class="fa-solid fa-calendar-days"></i> {{$user -> dob}}</p>
            <p><i class="fa-solid fa-check"></i> {{$user -> firstname}}</p>
        </div>
    </section>
    <section class="personal2">
        <div class="list">
            <p>{{$user -> gender}}</p>
            <p>{{$user -> maritalstatus}}</p>
        </div>
        <div class="list">
            <p>{{$user -> firstname}} {{$user -> lastname}}</p>
            <p>{{$user -> occupation}}</p>
        </div>
        <div class="list">
            <p>{{$user -> address}}</p>
            <p>{{$user -> religion}}</p>
        </div>
        <div class="list">
            <p>{{$user -> nationality}}</p>
            <p>{{$user -> stateoforigin}}</p>
        </div>
        <div class="list">
            <p>{{$user -> socialmediahandle}}</p>
            <p>{{$user -> workstatus}}</p>
        </div>
        <div class="list">
            <p>{{$user -> dateinducted}}</p>
            <p>{{$user -> noblehousestatus}}</p>
        </div>
        <div class="list">
            <p>{{$user -> currentposition}}</p>
            <p>{{$user -> jemail}}</p>
        </div>
    </section>

    <!-- timeline -->
    <section class="time">
        <h2>CAREER</h2>
        <div class="btn-container">
            <button id="add-career">
                <i class="fa-solid fa-plus"></i> ADD CAREER
            </button>
        </div>

        <section class="timeline">
            @foreach($boy as $boys)
            <div class="container left">
                <div class="date">{{$boy->year}}</div>
                <i class="icon fa fa-home"></i>
                <div class="content">
                    <p>
                       {{$boy->career}}
                    </p>
                </div>
            </div>
            @endforeach
            <div class="container right">
                <div class="date">{{$user->dateinducted}}</div>
                <i class="icon fa fa-gift"></i>
                <div class="content">
                    <p>
                        {{$user->currentposition}}
                    </p>

                </div>
            </div>


        </section>
    </section>
</main>

<dialog id="dialog">

    <form action="{{url('addprofile', $user->id)}}" method="POST" enctype="multipart/form-data" id="dialog-form">
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
 @csrf
        <div class="dialog-header">

            <h3>Add a Career</h3>
            <i class="fa-regular fa-circle-xmark fa-lg" id="close"></i>
        </div>
        <input
            type="number"
            name="year"
            id="year"
            required
            placeholder="Year"
        />
        <select name="career" id="current-position">
            <option value="" selected hidden disabled>Select a Position</option>
            <option value="Chapter President">Chapter President</option>
            <option value="Immediate President">Immediate President</option>
            <option value="Executive Vice President">Executive Vice President</option>
            <option value="First Vice President">First Vice President</option>
            <option value="Second Vice President">Second Vice President</option>
            <option value="General Legal Counsel">General Legal Counsel</option>
            <option value="Secretary General">Secretary General</option>
            <option value="Assitant Secretary General">Assitant Secretary General</option>
            <option value="Tresure">Tresurer</option>
            <option value="Director of Growth and Membership Services">Director of Growth and Membership Services</option>
            <option value="Director of Individual oppurtunities">Director of Individual oppurtunities</option>
            <option value="Director of Awards and Documentation">Director of Awards and Documentation</option>
            <option value="Director of Projects">Director of Projects</option>
            <option value="Director of International Affairs">Director of International Affairs</option>
            <option value="Director of Business Oppurtunities">Director of Business Oppurtunities</option>
            <option value="Director of Protocol">Director of Protocol</option>
            <option value="Director of Publicity">Director of Publicity</option>
            <option value="Director of Welfare">Director of Welfare</option>
            <option value="Meeting Manager">Meeting Manager</option>
            <option value="Executive Assitant to the President">Executive Assitant to the President</option>
            <option value="Chief Executive Assistant">Chief Executive Assistant</option>
            <option value="Chairperson EBMC">Chairperson EBMC</option>
            <option value="Chairperson Elite Job Fair">Chairperson Elite Job Fair</option>
            <option value="Chairperson International Women's Day">Chairperson International Women's Day</option>
            <option value="Chairperson Hangout with the Elite">Chairperson Hangout with the Elite</option>
            <option value="Floor Member">Floor Member</option>
            <option value="Past President">Past President</option>
            <option value="Alumni">Alumni</option>
        </select>

        <button type="submit" id="modal-btn">Submit</button>
    </form>
</dialog>

<script
    src="https://kit.fontawesome.com/f698b33fa3.js"
    crossorigin="anonymous"
></script>
<script src="{{url('js/header.js')}}" defer></script>

<script>
    const addCareer = document.getElementById('add-career');
    const dialogForm = document.getElementById('dialog-form');
    const dialog = document.getElementById('dialog');
    const closeButton = document.getElementById('close');

    addCareer.addEventListener('click', () => {
        dialog.showModal();
    });
    dialogForm.addEventListener('submit', () => {
        dialogForm.close();
    });
    closeButton.addEventListener('click', () => {
        dialog.close();
    });
</script>
</body>
</html>
