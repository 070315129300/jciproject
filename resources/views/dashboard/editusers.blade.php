<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add New Members</title>
    <link rel="stylesheet" href="{{url('style/sidebar.css')}}" />
    <link rel="stylesheet" href="{{url('style/add-members.css')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <script
        src="https://kit.fontawesome.com/f698b33fa3.js"
        crossorigin="anonymous"
    ></script>
    <script src="{{url('js/header.js')}}" defer></script>
</head>
<body>
<section class="sidebar">
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
        <h2>EDIT A NEW MEMBER</h2>
        <i class="fa-solid fa-bars fa-lg" id="menu-icon"></i>
        <div class="res-menu">
            <ul>
                <li><a href="alluser">All Members</a></li>
                <li><a href="adduser">Add New Members</a></li>
                <li><a href="addadmin">Add an Admin</a></li>
            </ul>
        </div>
    </section>

    <section class="form-container">
        <form action="{{url('editalluser', $user->id )}}" method="POST" enctype="multipart/form-data">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
                @method('PUT')
            <div class="grid">
                <p>Personal Information:</p>
                <div class="sec">
                    <input
                        type="text"
                        name="firstname"
                        id="first-name"
                        placeholder="First Name"
                        value ="{{$user->firstname}}"
                        maxlength="20"
                    />
                    <input
                        type="text"
                        name="lastname"
                        id="last-name"
                        placeholder="Last Name"
                        required
                        value ="{{$user->lastname}}"
                        maxlength="20"
                    />
                </div>
                <div class="sec">
                    <input
                        type="email"
                        name="pemail"
                        id="email"
                        placeholder="Personal Email Address"
                        value ="{{$user->email}}"
                        required
                    />
                    <div class="label">
                        <label for="dob">Date of Birth:</label>
                        <input
                            type="date"
                            name="dob"
                            id="date-of-birth"
                            placeholder="Date of Birth"
                            value ="{{$user->dob}}"
                            required
                        />
                    </div>
                </div>
                <div class="sec">
                    <div class="label">
                        <select name="gender" id="gender" required>
                            <option value="" disabled hidden selected>Gender</option>
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                        </select>
                    </div>
                    <div class="label">
                        <select name="maritalstatus" id="marital-status">
                            <option value="" disabled hidden selected>
                                Marital Status
                            </option>
                            <option value="married">Married</option>
                            <option value="single">Single</option>
                        </select>
                    </div>
                </div>

                <div class="sec">
                    <input
                        type="tel"
                        name="phone"
                        id="phone-number"
                        placeholder="Phone Number"
                        value ="{{$user->phone}}"
                        required
                    />
                    <input
                        type="text"
                        name="nextofkin"
                        id="next-of-kin"
                        required
                        placeholder="Next of Kin"
                        value ="{{$user->nextofkin}}"
                        maxlength="20"
                    />
                </div>
                <div class="sec">
                    <input
                        type="text"
                        name="occupation"
                        id="occupation"
                        value ="{{$user->occupation}}"
                        placeholder="Occupation"
                    />
                    <input
                        type="text"
                        name="address"
                        id="home-address"
                        required
                        value ="{{$user->address}}"
                        placeholder="Home Address"
                    />
                </div>
                <div class="sec">
                    <select name="religion" id="religion" required>
                        <option value="" disabled hidden selected>Religion</option>
                        <option value="christian">Christian</option>
                        <option value="muslim">Muslim</option>
                    </select>
                    <input
                        type="text"
                        name="nationality"
                        id="nationality"
                        required
                        value ="{{$user->nationality}}"
                        placeholder="Nationality"
                    />
                </div>
                <div class="sec">
                    <input
                        type="text"
                        name="stateoforigin"
                        id="state-of-origin"
                        required
                        value ="{{$user->stateoforigin}}"
                        placeholder="State of Origin"
                    />
                    <input
                        type="text"
                        name="socialmediahandle"
                        id="social-media-handle"
                        required
                        value ="{{$user->socialmediahandle}}"
                        placeholder="Social Media Handle"
                    />
                </div>
                <div class="sec">
                    <select name="workstatus" id="work-status" required>
                        <option value="" disabled hidden selected>Work Status</option>
                        <option value="student">Student</option>
                        <option value="employed">Employed</option>
                        <option value="self-employed">Self Employed</option>
                        <option value="non-employed">Non Employed</option>
                    </select>
                    <label class="label2" for="inputTag">
                        Select Profile Image <br />
                        <i class="fa fa-camera"></i>
                        <input id="inputTag" name="file" type="file" required />
                        <br />
                        <span id="imageName"></span>
                    </label>
                </div>

                <p>JCI Information:</p>
                <div class="sec">
                    <div class="label">
                        <label for="dateinducted">Date Inducted:</label>
                        <input
                            type="date"
                            name="dateinducted"
                            id="dateinducted"
                            value ="{{$user->dateinducted}}"
                            required
                        />
                    </div>
                    <div class="label">
                        <label for="noblehousestatus">Noble House Status</label>
                        <select
                            name="noblehousestatus"
                            id="noblehousestatus"
                            required
                        >
                            <option value="" disabled hidden selected>Select One</option>
                            <option value="none">None</option>
                            <option value="jcin_ambassador">JCIN Ambassador</option>
                            <option value="jcin councilor">JCIN Councillor</option>
                            <option value="jci senator">JCI Senator</option>
                        </select>
                    </div>
                </div>
                <div class="sec">
                    <div class="label">
                        <label for="currentposition">Current Position:</label>
                        <select name="currentposition" id="current-position">
                            <option value="" selected hidden disabled>
                                Select a Position
                            </option>
                            <option value="Chapter-President">Chapter President</option>
                            <option value="Immediate-President">
                                Immediate President
                            </option>
                            <option value="Executive-Vice-President">
                                Executive Vice President
                            </option>
                            <option value="First-Vice-President">
                                First Vice President
                            </option>
                            <option value="Second-Vice-President">
                                Second Vice President
                            </option>
                            <option value="General Legal Counsel">
                                General Legal Counsel
                            </option>
                            <option value="Secretary General">Secretary General</option>
                            <option value="Assitant Secretary General">
                                Assitant Secretary General
                            </option>
                            <option value="Tresurer">Tresurer</option>
                            <option value="Director of Growth and Membership Services">
                                Director of Growth and Membership Services
                            </option>
                            <option value="Director of Individual oppurtunities">
                                Director of Individual oppurtunities
                            </option>
                            <option value="Director of Awards and Documentation">
                                Director of Awards and Documentation
                            </option>
                            <option value="Director of Projects">
                                Director of Projects
                            </option>
                            <option value="Director of International Affairs">
                                Director of International Affairs
                            </option>
                            <option value="Director of Business Oppurtunities">
                                Director of Business Oppurtunities
                            </option>
                            <option value="Director of Protocol">
                                Director of Protocol
                            </option>
                            <option value="Director of Publicity">
                                Director of Publicity
                            </option>
                            <option value="Director of Welfare">
                                Director of Welfare
                            </option>
                            <option value="Meeting Manager">Meeting Manager</option>
                            <option value="Executive Assitant to the President">
                                Executive Assitant to the President
                            </option>
                            <option value="Chief Executive Assistant">
                                Chief Executive Assistant
                            </option>
                            <option value="Chairperson EBMC">Chairperson EBMC</option>
                            <option value="Chairperson Elite Job Fair">
                                Chairperson Elite Job Fair
                            </option>
                            <option value="Chairperson International Women's Day">
                                Chairperson International Women's Day
                            </option>
                            <option value="Chairperson Hangout with the Elite">
                                Chairperson Hangout with the Elite
                            </option>
                            <option value="Floor Member">Floor Member</option>
                            <option value="Past President">Past President</option>
                            <option value="Alumni">Alumni</option>
                        </select>
                    </div>

                    <input
                        type="email"
                        name="jemail"
                        id="jci-email"
                        value ="{{$user->jemail}}"
                        placeholder="JCI Email Address"
                    />
                </div>
            </div>
            <div class="submit-btn"><button type="submit">Submit</button></div>
        </form>
    </section>
</main>
</body>
</html>
