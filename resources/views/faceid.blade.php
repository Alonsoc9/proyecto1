<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('assets/login/images/icons/favicon.ico')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/login/css/main.css')}}">
	

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/ciber2.jpg');">
				<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
					
						<!-- Agrega la imagen aquí -->
						<div class="image-container mb-4 text-center">
							<!-- Agrega la imagen aquí -->
							<img src="img/icon-rostro2.png" alt="rostro" class="logo-img mx-auto" height="300" width="600">
						</div>
											 
				
					<div class="container">
						<button onclick="enrollNewUser()" title="Enroll a new user on this FACEIO application" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">
							Enroll New User
						</button>
												
						<button onclick="authenticateUser()" title="Authenticate a previously enrolled user on this application" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">
							Authenticate User
						</button>

						
					</div>
					<div id="faceio-modal"></div>
				</div>
			</div>
		</div>
	</div>


<script src="https://cdn.faceio.net/fio.js"></script>
<script type="text/javascript">
	// Initialize the library first with your application Public ID.
	// Grab your public ID from the Application Manager on the FACEIO console at: https://console.faceio.net/
	const faceio = new faceIO("fioae9c2"); // Replace with your application Public ID
	function enrollNewUser() {
		// Start the facial enrollment process
		faceio.enroll({
			"locale": "auto", // Default user locale
			"userConsent": false, // Set to true if you have already collected user consent
			"payload": {
				/* The payload we want to associate with this particular user
				* which is forwarded back to us on each of his future authentication...
				*/
				"whoami": 123456, // Example of dummy ID linked to this particular user
				"email": "john.doe@example.com"
			}
		}).then(userInfo => {
			// User Successfully Enrolled!
			alert(
			`User Successfully Enrolled! Details:
			Unique Facial ID: ${userInfo.facialId}
			Enrollment Date: ${userInfo.timestamp}
			Gender: ${userInfo.details.gender}
			Age Approximation: ${userInfo.details.age}`
			);
			console.log(userInfo);
			// handle success, save the facial ID, redirect to dashboard...
			//
			// faceio.restartSession() let you enroll another user again (without reloading the entire HTML page)
		}).catch(errCode => {
			// handle enrollment failure. Visit:
			// https://faceio.net/integration-guide#error-codes
			// for the list of all possible error codes
			handleError(errCode);
			
			// If you want to restart the session again without refreshing the current TAB. Just call:
			faceio.restartSession();
			// restartSession() let you enroll the same or another user again (in case of failure) without refreshing the entire page.
		});
	}
	function authenticateUser() {
		// Start the facial authentication process (Identify a previously enrolled user)
		faceio.authenticate({
			"locale": "auto" // Default user locale
		}).then(userData => {
			console.log("Success, user recognized")
			// Grab the facial ID linked to this particular user which will be same
			// for each of his successful future authentication. FACEIO recommend
			// that your rely on this ID if you plan to uniquely identify
			// all enrolled users on your backend for example.
			console.log("Linked facial Id: " + userData.facialId)
			// Grab the arbitrary data you have already linked (if any) to this particular user
			// during his enrollment via the payload parameter the enroll() method takes.
			console.log("Associated Payload: " + JSON.stringify(userData.payload))
			// {"whoami": 123456, "email": "john.doe@example.com"} set via enroll()
			//
			// faceio.restartSession() let you authenticate another user again (without reloading the entire HTML page)
			//

			window.location.href = "{{ url('/dashboard') }}";
		}).catch(errCode => {
			// handle authentication failure. Visit:
			// https://faceio.net/integration-guide#error-codes
			// for the list of all possible error codes
			handleError(errCode);
			
			// If you want to restart the session again without refreshing the current TAB. Just call:
			faceio.restartSession();
			// restartSession() let you authenticate the same user again (in case of failure) 
			// without refreshing the entire page.
			// restartSession() is available starting from the PRO plan and up, so think of upgrading your app
			// for user usability.
		});
	}
	function handleError(errCode) {
		// Log all possible error codes during user interaction..
		// Refer to: https://faceio.net/integration-guide#error-codes
		// for a detailed overview when these errors are triggered.
		switch (errCode) {
			case fioErrCode.PERMISSION_REFUSED:
				console.log("Access to the Camera stream was denied by the end user");
				break;
			case fioErrCode.NO_FACES_DETECTED:
				console.log("No faces were detected during the enroll or authentication process");
				break;
			case fioErrCode.UNRECOGNIZED_FACE:
				console.log("Unrecognized face on this application's Facial Index");
				break;
			case fioErrCode.MANY_FACES:
				console.log("Two or more faces were detected during the scan process");
				break;
			case fioErrCode.FACE_DUPLICATION:
				console.log("User enrolled previously (facial features already recorded). Cannot enroll again!");
				break;
			case fioErrCode.MINORS_NOT_ALLOWED:
				console.log("Minors are not allowed to enroll on this application!");
			break;
			case fioErrCode.PAD_ATTACK:
				console.log("Presentation (Spoof) Attack (PAD) detected during the scan process");
				break;
			case fioErrCode.FACE_MISMATCH:
				console.log("Calculated Facial Vectors of the user being enrolled do not matches");
				break;
			case fioErrCode.WRONG_PIN_CODE:
				console.log("Wrong PIN code supplied by the user being authenticated");
				break;
			case fioErrCode.PROCESSING_ERR:
				console.log("Server side error");
				break;
			case fioErrCode.UNAUTHORIZED:
				console.log("Your application is not allowed to perform the requested operation (eg. Invalid ID, Blocked, Paused, etc.). Refer to the FACEIO Console for additional information");
				break;
			case fioErrCode.TERMS_NOT_ACCEPTED:
				console.log("Terms & Conditions set out by FACEIO/host application rejected by the end user");
				break;
			case fioErrCode.UI_NOT_READY:
				console.log("The FACEIO Widget could not be (or is being) injected onto the client DOM");
				break;
			case fioErrCode.SESSION_EXPIRED:
				console.log("Client session expired. The first promise was already fulfilled but the host application failed to act accordingly");
				break;
			case fioErrCode.TIMEOUT:
				console.log("Ongoing operation timed out (eg, Camera access permission, ToS accept delay, Face not yet detected, Server Reply, etc.)");
				break;
			case fioErrCode.TOO_MANY_REQUESTS:
				console.log("Widget instantiation requests exceeded for freemium applications. Does not apply for upgraded applications");
				break;
			case fioErrCode.EMPTY_ORIGIN:
				console.log("Origin or Referer HTTP request header is empty or missing");
				break;
			case fioErrCode.FORBIDDDEN_ORIGIN:
				console.log("Domain origin is forbidden from instantiating fio.js");
				break;
			case fioErrCode.FORBIDDDEN_COUNTRY:
				console.log("Country ISO-3166-1 Code is forbidden from instantiating fio.js");
				break;
			case fioErrCode.SESSION_IN_PROGRESS:
				console.log("Another authentication or enrollment session is in progress");
				break;
			case fioErrCode.NETWORK_IO:
			default:
				console.log("Error while establishing network connection with the target FACEIO processing node");
				break;
		}
	}
</script>
<!--===============================================================================================-->
<script src="{{asset('assets/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('assets/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('assets/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets/login/js/main.js')}}"></script>


<!-- Template Javascript -->
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>