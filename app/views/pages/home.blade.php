@extends('layouts.master')

@section('title') Home @stop()

@section('content') 

    <div>
        <h4><a href="{{route('show')}}">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate nihil amet hic, reiciendis voluptatem assumenda!</a></h4>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore non optio tenetur eligendi nemo rem commodi veritatis, error a perspiciatis voluptatem dolor totam est blanditiis quas veniam, consequuntur dolorum. Harum ad, sapiente repudiandae. Dolore facere veniam sint, corporis quia eligendi, quod non reprehenderit ut odit nulla, nemo doloremque! Dolorum accusantium quia aliquid recusandae nam eveniet culpa sapiente incidunt rerum reprehenderit voluptate iste molestias, aperiam eligendi? Eaque quisquam dignissimos eligendi eum, commodi reiciendis consequuntur pariatur in asperiores adipisci hic maxime eveniet numquam tempore laborum obcaecati possimus aspernatur, iusto ea ipsum quidem? Id molestiae fugit, natus eum nulla non unde ea reiciendis.
        </p>
        {{ link_to(route('show'), 'Details') }}
    </div>

@stop()