

					 <style type="text/css">

        .clockStyle {

        

        border:#5D6677 10px outset;

        padding:4px;

        color:#5D6677;

        font-family:"Arial Black", Gadget, sans-serif;

                font-size:16px;

                font-weight:bold;

        letter-spacing: 2px;

        display:inline;
		border-radius:25px;

		

        }

        </style>

             <div id="clockDisplay" class="clockStyle"></div>

				<script type="text/javascript" language="javascript">

                function renderTime() {

                var currentTime = new Date();

                var diem = "AM";

                var h = currentTime.getHours();

                var m = currentTime.getMinutes();

                    var s = currentTime.getSeconds();

                setTimeout('renderTime()',1000);

                    if (h == 0) {

                h = 12;

                } else if (h > 12) { 

                h = h - 12;

                diem="PM";

                }

                if (h < 10) {

                h = "0" + h;

                }

                if (m < 10) {

                m = "0" + m;

                }

                if (s < 10) {

                s = "0" + s;

                }

                    var myClock = document.getElementById('clockDisplay');

                myClock.textContent = h + ":" + m + ":" + s + " " + diem;

                myClock.innerText = h + ":" + m + ":" + s + " " + diem;

                }

                renderTime();

                </script>

             