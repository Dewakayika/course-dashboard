@extends('Course.layouts.app')

@section('title')
    Course | Basic Webtoon
@endsection

@section('content')
    <style type="text/css">
        #volunteer {
            max-width: 600px;
            padding: 20px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .active-menu {
            background-color: #007bff;
            color: white;
        }

        .video-overview {
            font-size: 0.875rem;
            color: #555;
            margin-top: 4px;
        }

        .video-overview .overview-title {
            font-weight: bold;
            margin-bottom: 8px;
        }

        .video-overview span {
            display: block;
            margin-bottom: 4px;
            margin-top: 4px;
            text-align: justify;
        }
        .video-material{
            font-weight: bold;
            font-size: 0.875rem;
            color: #555;
            text-decoration: underline;
        }

        .hamburger {
            position: fixed;
            top: 90%;
            padding: 15px;
            margin-left: -15px;
            background: rgb(141, 141, 141);
            border-radius: 5px;
            color: white;
        }

        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        @media (min-width:768px){
            .hamburger{
                display: none;
            }
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -100%;
                top: 0;
                bottom: 0;
                width: 80%;
                transition: 0.3s;
                z-index: 1000;
            }

            .sidebar.open {
                left: 0;
            }

            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 999;
            }

            .hamburger {
                display: block;
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 1001;
                background: none;
                border: none;
                font-size: 30px;
                cursor: pointer;
            }
        }
    </style>

    <!-- Start content -->
    <div class="bg-gray-100">
        <!-- Hamburger menu button -->
        <button class="hamburger" onclick="toggleSidebar()"  style="            
            position: fixed;
            top: 90%;
            padding: 15px;
            margin-left: -15px;
            background: rgb(141, 141, 141);
            /* border-image: round; */
            border-radius: 5px;
            color: white;
            ">
            <i class="fa-solid fa-bars"></i>    
        </button>

        <!-- Overlay -->
        <div class="overlay" onclick="toggleSidebar()"></div>

        <div class="flex flex-col md:flex-row h-screen">
            <!-- Sidebar -->
            <aside class="sidebar w-full md:w-80 bg-white p-4 overflow-y-auto">
                <a class="flex items-center mb-6" href="{{ route('intern#index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="text-lg font-bold">My Dashboard</span>
                </a>
                <nav>   
                    <div class="mb-4">
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="video-link flex items-center p-2 rounded hover:bg-gray-100" data-video="introduction">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Introduction</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="video-link flex items-center p-2 rounded hover:bg-gray-100" data-video="whatstoryboard">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>What's Storyboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="video-link flex items-center p-2 rounded hover:bg-gray-100" data-video="understanding-aspec-ratio">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Aspec Ratio and Type of Shots</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="video-link flex items-center p-2 rounded hover:bg-gray-100" data-video="rule-of-third">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Webtoon Type of Shots</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="video-link flex items-center p-2 rounded hover:bg-gray-100" data-video="conclution-camera-shots">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>Conclutions Camera and Shots</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </aside>

            <!-- Main content -->
            <main class="flex-1 p-4 md:p-8 overflow-y-auto">
                <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                    <h1 class="text-2xl font-bold mb-2">Comic and Webtoon Introduction</h1>
                </header>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <div class="video-container mt-4">
                        <iframe id="video-placeholder" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <h2 id="video-title" class="text-2xl font-bold mt-2">Tittle Course</h2>
                    <div id="video-overview" class="video-overview">
                        <!-- Video Overview content will be injected here dynamically -->
                    </div>
                    <div class="video-material">
                        <a href="https://drive.google.com/drive/folders/1XTYMZqVjHHGQRm6jW61EiW8crtd9qJJU?usp=drive_link"  target="_blank">Download Material</a>
                    </div>
                </div>
            </main>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const videoLinks = document.querySelectorAll('.video-link');
                const videoPlaceholder = document.getElementById('video-placeholder');
                const videoTitle = document.getElementById('video-title');
                const videoOverview = document.getElementById('video-overview');

                // Automatically select the first video when the page loads
                const firstVideoLink = videoLinks[0];
                firstVideoLink.classList.add('active-menu');
                updateVideo(firstVideoLink.getAttribute('data-video'));

                videoLinks.forEach(link => {
                    link.addEventListener('click', function(e) {
                        e.preventDefault();
                        const videoId = this.getAttribute('data-video');
                        updateVideo(videoId);

                        // Remove active class from all links
                        videoLinks.forEach(l => l.classList.remove('active-menu'));
                        // Add active class to clicked link
                        this.classList.add('active-menu');

                        // Close sidebar on mobile after clicking a link
                        if (window.innerWidth <= 768) {
                            toggleSidebar();
                        }
                    });
                });

                function updateVideo(videoId) {
                    let videoUrl, title, overviewContent;
                    switch(videoId) {
                        case 'introduction':
                            videoUrl = 'https://drive.google.com/file/d/1IjacTcsDBe0FFm1MdVoWifG5jIwEdWV8/preview';
                            title = 'Introduction';
                            overviewContent = `
                                <span class="overview-title">Duration: 0:54 minute | Beginner</span>
                                <hr>
                                <span>Before you can start drawing your comic, you need to know the basics of shot composition and camera angles, and why they're crucial to successfully telling your story on the page. Ben talks about the rule of thirds, wide shots, full shots, medium shots, close-ups, and more. He also demonstrates the importance of following the action in the same direction throughout any given scene. Storyboarding may not always be associated with comics, but the same rules apply. Knowing and understanding these concepts can strengthen your work.</span>
                            `;
                            break;
                        case 'whatstoryboard':
                            videoUrl = 'https://drive.google.com/file/d/1s0c5Tu9oMiFMoHhiRCO3_uPbMUE1YKs6/preview';
                            title = 'What`s Storyboarding?';
                            overviewContent = `
                                <span class="overview-title">Duration: 1:49 minute | Beginner</span>
                                <hr>
                                <span>A storyboard is a visual representation of a film, animation, or comic book's sequence of events. It consists of a series of sketches or illustrations that depict the flow of action, camera angles, and pacing of the story. The purpose of a storyboard is to provide a visual guide that outlines how a story will unfold, scene by scene.</span>
                                <span>Skills Covered: storyboarding</span>
                            `;
                            break;
                        case 'understanding-aspec-ratio':
                            videoUrl = 'https://drive.google.com/file/d/1YKAnlfapBaPLTVUqAq-4BZaxlsFdLh6v/preview';
                            title = 'Aspect Ratio & Rule of Third';
                            overviewContent = `
                                <span class="overview-title">Duration: 5:24 seconds | Beginner</span>
                                <hr>
                                <span>When it comes to conveying a story visually to readers, comic book artists can learn a lot from examining how shots are filmed in movies and television. Although comic book panels aren't always a standard rectangular frame, you can still leverage the same storyboarding concepts, rules, and methods used in film to make your comics stronger and more digestible. In this course, join comic creator Ben Bishop as he explains how to use storyboard film techniques to understand shot composition, consistency, and movement within a frame, and apply those techniques as you build your comic book panels.</span>
                                <span>The Rule of Thirds is a fundamental principle of composition that divides an image into nine equal parts using two equally spaced horizontal lines and two equally spaced vertical lines. By placing key elements along these lines or at their intersections, you create a more balanced, engaging, and visually appealing composition.</span>
                                <span>Skills Covered: Understanding Aspect Ratio</span>
                            `;
                            break;
                        case 'rule-of-third':
                            videoUrl = 'https://drive.google.com/file/d/1Fo-bTmD09_a9rDs8n6cVQ3FPFHimTnwx/preview';
                            title = 'Undestanding Type of Shots';
                            overviewContent = `
                                <span class="overview-title">Duration: 7:02 minute | Beginner</span>
                                <hr>
                                <span>Understanding the different types of shots is crucial for storyboarding, as each type serves a specific purpose in conveying the story, setting the scene, and highlighting character actions and emotions. </span>
                                <span>Skills Covered: Camera Shots, Wide Shot, Medium Shot, CloseUp Shot.</span>
                            `;
                            break;
                        case 'conclution-camera-shots':
                            videoUrl = 'https://drive.google.com/file/d/1dTXTx7eERuyhhiO_xcm5Wm0rdm-XuH1n/preview';
                            title = 'Conclutions Camera and Shots';
                            overviewContent = `
                                <span class="overview-title">Duration: 1:24 minute | Beginner</span>
                                <hr>
                                <span>Understanding the different types of shots is crucial for storyboarding, as each type serves a specific purpose in conveying the story, setting the scene, and highlighting character actions and emotions. </span>
                                <span>Skills Covered: Camera Shots, Wide Shot, Medium Shot, CloseUp Shot.</span>
                            `;
                            break;
                    }

                    videoTitle.textContent = title;
                    videoPlaceholder.src = videoUrl;
                    videoOverview.innerHTML = overviewContent;
                }
            });

            // Function to toggle sidebar
            function toggleSidebar() {
                const sidebar = document.querySelector('.sidebar');
                const overlay = document.querySelector('.overlay');
                sidebar.classList.toggle('open');
                if (sidebar.classList.contains('open')) {
                    overlay.style.display = 'block';
                } else {
                    overlay.style.display = 'none';
                }
            }
        </script>
    </div>
    <!-- End content -->
@endsection