<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<style type="text/css">
			h4 {
            display: block;
            -webkit-margin-before: 0px;
            -webkit-margin-after: 2px ;
            -webkit-margin-start: 2px;
            -webkit-margin-end: 0px;
            font-weight: bold;
        }

        h3 {
            display: block;
            font-size: 1.17em;
            -webkit-margin-before: 0px;
            -webkit-margin-after: 2px;
            -webkit-margin-start: 2px;
            -webkit-margin-end: 0px;
            font-weight: bold;
        }

        p {
            display: block;
            -webkit-margin-before: 2px;
            -webkit-margin-after: 2px;
            -webkit-margin-start: 0px;
            -webkit-margin-end: 0px;
        }

        #header {
            width: 100%;
            height: 120px;
            float: left;
            text-align: center;
        }
        #heading {
            width: 76%;
            float: left;
        }
        .header-img {
            width: 12%;
            height: 19%;
            float: left;
        }
        .info-type div, .info-field div {
        	float: left;
        	font-size: 0.7em; 
        	border: 1px solid black;
        	text-align: center;
        	padding-top: 2px;
        	padding-bottom: 2px;
        }
        .questions div{
        	float: left;
        	font-size: 0.7em; 
        	border: 1px solid black;
        	height: 40px;
        	padding-top: 5px;
        	text-align: center;	
        }
		.page-break {
			page-break-after: always;
		}
		</style>
	</head>
	<body>
		@foreach($students as $student)
			<div id="header">
				<div class="header-img">
					<img src="/images/ats/iearnbd_logo.png" height="80" width="80">
				</div>
				<div id="heading">
					<h4>International Education and Resource Network – Bangladesh (iEARN-BD)</h4>
					<h4>Kennedy – Lugar Youth Exchange and Study (YES) Program 2021-22 <br> Date:  5,6 & 7 January 2020</h4>
					<h3>Interview Round</h3>
					<h3>Parents' Questionnaire</h3>
				</div>
				<div class="header-img ">
					<img src="/images/ats/yes_logo.png" height="80" width="80">
				</div>
			</div>

			<div class="student-info">
				<div class="info-type">
					<div style="width: 10%">Serial</div>
					<div style="width: 35%">Name of Student</div>
					<div style="width: 54%">Name of Parent Present</div>
				</div>
				<div style="clear: both;"></div>

				<div class="info-field">
					<div style="width: 10%">{{$student->final_id}}</div>
					<div style="width: 35%">{{$student->first_name}} {{$student->last_name}}</div>
					<div style="width: 54%">{{$student->parent_for_interview}}</div>
				</div>
			</div>
			<div style="clear: both;"><br></div>
			<div style="text-align: center;border: 1px solid black;font-size: 0.9em"><strong>Program</strong></div>
			<div class="questions">
				<div style="width: 29.8%">What is the YES Program about?</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Do both parents agree to the participation in the program?</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Do you know what the goals of the program are?</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Parents overly interested in Student's participation?	</div>
				<div style="width: 69.5%"></div>
			</div>
			<div style="clear: both"></div>
			<div style="text-align: center;border: 1px solid black;font-size: 0.9em"><strong>Placement concerns - preferences and expectations</strong></div>
			<div class="questions">
				<div style="width: 29.8%">Placement concerns - preferences and expectations</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Being placed in a non-traditional family (Same Sex, Single Parent)</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Religious concerns - participating in HF religious activities</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Halal meat availability</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Will the student be able to take part in household chores?</div>
				<div style="width: 69.5%"></div>
			</div>
			<div style="clear: both"></div>
			<div style="text-align: center;border: 1px solid black;font-size: 0.9em"><strong>Academics</strong></div>
			<div class="questions">
				<div style="width: 29.8%;">The student may have a loss of year, do you understand this?</div>
				<div style="width: 69.5%;"></div>
				<div style="width: 29.8%; height: 60px">
					The student may choose subjects of his/her preference, but has to take mandatory subjects set by the host school Language/US History/Science Classes
				</div>
				<div style="width: 69.5%; height: 60px"></div>
				<div style="width: 29.8%">The student has to maintain a minimum of B grade in all the subjects</div>
				<div style="width: 69.5%"></div>
			</div>
			<div style="clear: both"></div>
			<div style="text-align: center;border: 1px solid black;font-size: 0.9em"><strong>Communication</strong></div>
			<div class="questions">
				<div style="width: 29.8%; overflow-wrap: break-word; height: 40px">
					Parent's are allowed to communicate with the students twice a month over phone. Is that fine for you?
				</div>
				<div style="width: 69.5%; height: 40px"></div>
			</div>
			<div style="clear: both"></div>
			<div style="text-align: center;border: 1px solid black;font-size: 0.9em"><strong>Rules and Responsibilities</strong></div>
			<div class="questions">
				<div style="width: 29.8%">Student will abide by the program rules and the rules set by the host family</div>
				<div style="width: 69.5%"></div>
				<div style="width: 29.8%">Student will join YES Alumni Bangladesh and actively participate</div>
				<div style="width: 69.5%"></div>
			</div>
			<div class="page-break"></div>
		@endforeach
	</body>
</html>