@extends('layouts.app')

@section('content')
    <!-- todo: refactor to sass -->
    <style>

        .index-container{
            margin-top: -20px;
            background-color: black;   
            position: relative;         
        }

        .index-background{
            width: 100%;
            filter: grayscale(90%);
        }

        .index-content{
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.85));
            color: white;
            position: absolute;
            bottom: 0;
            padding: 20px;
            padding-top: 120px;
            padding-bottom: 100px; /* <- ugly. fix in refactor */
            left: 0;
            right: 0;    
        }

        body{
            background: grey;
        }

        html, body, .index-container, .index-background{
            height: 100%;
        }

        .form-inline .form-group .search-bar{
            width: 80%;
        }
    
    </style>

    <div class="index-container">
    
        <img class="index-background" src="./images/index/dsc_0035.jpg">

        <div class="index-content">

            <div class="container">

                <h1>British Birankai</h1>

                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam a odio sit amet enim cursus bibendum non at sem. Nunc ut neque tellus. Suspendisse non consectetur nunc, a feugiat lectus.</p>

                <p>Donec nec facilisis quam. Aliquam semper vehicula viverra. Sed porttitor magna eget nunc ornare pellentesque. Suspendisse interdum, est suscipit efficitur molestie, ante libero ornare sapien, vel consectetur ipsum neque nec quam. Vestibulum id dolor eget ante ornare mollis. Duis placerat risus maximus turpis placerat egestas. Fusce semper in neque ac sodales. Mauris non elementum nulla. Quisque imperdiet fringilla luctus. Aenean ac ante felis. Mauris vehicula in est e</p>
            
                <form class="form-inline col-md-10 col-md-offset-1">
                     <div class="form-group" style="width: 100%; margin-top: 50px;"> 
                        <input type="text" class="form-control search-bar" placeholder="Find your nearest dojo">
                        <button type="submit" class="btn btn-default">Search</button>
                     </div> 
                </form>
            
            </div>

            
        </div>

    </div>

@endsection
