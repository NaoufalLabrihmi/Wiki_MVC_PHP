<!DOCTYPE html>

<html>

<head>
  <title>404 Not Found</title>
  <style>
    * {
  font-family: Ubuntu, sans-serif;
}

body {
  margin: 0;
  padding: 0;
  background-color: #1e234d;
  height: 100%;
}

html {
  height: 100%;
  overflow: hidden;
}

.wrapper{
  position: absolute;
  margin: auto;
  top: 50%;
  transform: translateY(-50%);
  left: 0;
  right: 0;
  width: fit-content;
  text-align: center;
  z-index: 4;



span {
  &:first-letter{
  letter-spacing: 12vmax; 
  }
  position: relative;
  color: #fff;
  font-weight: 900;
  font-size: 20.4em;
  display: block;
  overflow: hidden;
  width: fit-content;
  height: max-content;
  &:before{
    content:'';
    background-image: url('https://staticdelivery.nexusmods.com/mods/1151/images/528-0-1447526230.png');
    position: absolute;
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;    
    animation: rotateIn 0.5s ease-out;
  }
}
 p {
  text-align: center;
  font-style: italic;
  font-weight: 400;
  color: #fff;
  margin-top: 0;
  line-height: 22px;
 }

 button {
      background-color: #f96e4d;
    border: 0;
    padding: 11px 22px;
    border-radius: 50px;
    color: #fff;
    margin-top: 10px;
    cursor: pointer;
    font-weight: 900;
 }
}


@keyframes spin {
  
  from {
    transform: rotate( 0deg );
  }
  
  to {
    transform: rotate( -360deg );
  }
}

@keyframes rotateIn {
  from {
    transform: rotate( 0deg ) scale(0.2);
    opacity: 0;
  }
  to {
    transform: rotate( 360deg ) scale(1);
    opacity: 1;
  }
}


.space {
  position: absolute;
  width: 400vw;
  height: 400vh;
  top: 50%;
  left: 50%;
  z-index: 1;
  margin-top: -200vh;
  margin-left: -200vw;
  animation: spin 240s linear infinite;
  background-size: 240px;
  backface-visibility: visible;
  background-image: url(data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8yIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDI0MCAyNDAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDI0MCAyNDAiIHhtbDpzcGFjZT0icHJlc2VydmUiPjxyZWN0IHg9IjEwNiIgeT0iOTAiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIyIiBoZWlnaHQ9IjIiLz48cmVjdCB4PSI3NCIgeT0iNjMiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIyMyIgeT0iNjYiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSI1MCIgeT0iMTEwIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iNjMiIHk9IjEyOCIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjQ1IiB5PSIxNDkiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSI5MiIgeT0iMTUxIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iNTgiIHk9IjgiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxNDciIHk9IjMzIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMiIgaGVpZ2h0PSIyIi8+PHJlY3QgeD0iOTEiIHk9IjQzIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iMTY5IiB5PSIyOSIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjE4MiIgeT0iMTkiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxNjEiIHk9IjU5IiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iMTM4IiB5PSI5NSIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjE5OSIgeT0iNzEiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIzIiBoZWlnaHQ9IjMiLz48cmVjdCB4PSIyMTMiIHk9IjE1MyIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjIiIGhlaWdodD0iMiIvPjxyZWN0IHg9IjEyOCIgeT0iMTYzIiBmaWxsPSIjRkZGRkZGIiB3aWR0aD0iMSIgaGVpZ2h0PSIxIi8+PHJlY3QgeD0iMjA1IiB5PSIxNzQiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxNTIiIHk9IjIwMCIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjxyZWN0IHg9IjUyIiB5PSIyMTEiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIyIiBoZWlnaHQ9IjIiLz48cmVjdCB5PSIxOTEiIGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiLz48cmVjdCB4PSIxMTAiIHk9IjE4NCIgZmlsbD0iI0ZGRkZGRiIgd2lkdGg9IjEiIGhlaWdodD0iMSIvPjwvc3ZnPg==);
}
  </style>
</head>

<body>
<!--Rick&Morty-->		
<div class="background-img">
		<div class="space"></div>
			<div class="wrapper">
				<div class="img-wrapper">
					<span>44</span>
				</div>
				<p>The page you are trying to search has been <br> moved to another universe.</p>
			</div>
		</div>

</body>
</html>