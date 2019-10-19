<?php /* Template Name: ROI Calc */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

        <?php
            // Include the page content template.
        get_template_part( 'template-parts/content', 'page' );

        ?> 
        
        <!-- ROI Calculator -->
        

        <section id="main-section">

            <div class="container" id="roical" > 
                <div class="row">
                    <div class="col-sm-6 pr-20">
                        <h3>Instructions</h3>
                        <p>Should I invest in a product or service that will save me time or should I do it myself?  Let’s calculate the Return on Investment (ROI) and find out.</p>
                        <p>Enter estimates for the inputs at right and click the <b>“Calculate”</b> button.  Use the “Learn More” to learn detail about each input.</p>
                        <br>
                        <img src="https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fspecials-images.forbesimg.com%2Fdam%2Fimageserve%2F1040138812%2F960x0.jpg%3Ffit%3Dscale">
                    </div>
                    <div class="col-sm-6" id="calculator">
                        <div id="basic">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3>The Basics</h3>
                                </div>
                                <div class="col-sm-6 pl-10"> 
                                    <label for="VOT">Value Of Your Time</label>
                                    <div class="input-group form-group">
                                        <input class="form-control" id="VOT" type="number"  min="0"  max="500" placeholder=" For e.g 25$"
                                        data-toggle="tooltip" title="Input the value of an hour of your time" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'For e.g 25$'" oninput="rangeInput.value=VOT.value">
                                        <div class="input-group-append" >
                                            <span class="input-group-text" id="cu1">$</span>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <input type="range" id="rangeInput"  min="0"  max="500" oninput="VOT.value=rangeInput.value"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="OTC">One Time Cost</label>
                                    <div class="input-group form-group">
                                        <input class="form-control" id="OTC" type="number" min="0" placeholder=" For e.g 50,000$"
                                        data-toggle="tooltip" title="Input any one-time costs to get started" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'For e.g 50,000$'" oninput="rangeInput1.value=OTC.value">
                                        <div class="input-group-append" >
                                            <span class="input-group-text" id="cu2">$</span>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <input type="range" id="rangeInput1" min="0" max="100000"  oninput="OTC.value=rangeInput1.value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="MTC">Monthly Cost</label>
                                    <div class="input-group form-group">
                                        <input class="form-control" id="MTC" type="number" min="0" placeholder=" For e.g 7000$"
                                        data-toggle="tooltip" title="How much does the service cost per month" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'For e.g 7000$'" oninput="rangeInput2.value=MTC.value">
                                        <div class="input-group-append" >
                                            <span class="input-group-text" id="cu3">$</span>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <input type="range" id="rangeInput2" min="0" max="10000"  oninput="MTC.value=rangeInput2.value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="ST">Set-up Time(hrs)</label>
                                    <div class="input-group form-group">
                                        <input class="form-control" id="ST" type="number" min="0" placeholder=" For e.g 12" data-toggle="tooltip"
                                        title="Input how many hours it will take to get full benefit (e.g. research, learning, practice" onfocus="this.placeholder = ''" onblur="this.placeholder = 'For e.g 12'" oninput="rangeInput3.value=ST.value">
                                        <div class="input-group-append" >
                                            <span class="input-group-text" >hours</span>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <input type="range" id="rangeInput3" min="0" max="24"  oninput="ST.value=rangeInput3.value">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="ETS">Minutes saved per week</label>
                                    <div class="input-group form-group">
                                        <input class="form-control" id="ETS" type="number" min="0" placeholder=" For e.g 300" data-toggle="tooltip"
                                        title="Estimate how many minutes you’ll save each week from this investment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'For e.g 300'">
                                        <div class="input-group-append" >
                                            <span class="input-group-text" >min/week</span>
                                        </div>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div>
                                        <input type="range" id="rangeInput4" min="0" max="600" oninput="ETS.value=rangeInput4.value" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" id="panel">
                            <div class="col-sm-12">
                                <h3>The Advance</h3>
                            </div>
                            <div class="col-sm-12">
                                <label for="TF">ROI Calculations TimeFrame(Years)</label>
                                <div class=" input-group form-group">
                                    <select class="form-control" id="TF">
                                        <option value="1" selected>1 Year</option>
                                        <option value="2">2 Years</option>
                                        <option value="3">3 Years</option>
                                        <option value="4">4 Years</option>
                                        <option value="5">5 Years</option>
                                        <option value="6">6 Years</option>
                                        <option value="7">7 Years</option>
                                        <option value="8">8 Years</option>
                                        <option value="9">9 Years</option>
                                        <option value="10">10 Years</option>
                                    </select>
                                    <div class="input-group-append" >
                                        <span class="input-group-text" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="NI">Name Of Investment</label>
                                <div class="input-group form-group">
                                    <input class="form-control" id="NI" type="text" placeholder=" For e.g Todo Premium" data-toggle="tooltip"
                                    title="Name of the thing in which you will be investing?" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'For e.g Todo Premium'">
                                    <div class="input-group-append" >
                                        <span class="input-group-text" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="des">Investment description</label>
                                <div class="input-group form-group">
                                    <textarea name="de" id="des" class="form-control" cols="20" rows="5"
                                    placeholder=" For e.g  Task App For 4 Team Members" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = ' For e.g  Task App For 4 Team Members'" ></textarea>
                                    <div class="input-group-append" >
                                        <span class="input-group-text"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="CR">Currency</label>
                                <div class="input-group form-group">
                                    <select class="form-control" id="CR">
                                        <option value="$">$</option>
                                        <option value="€">€</option>
                                        <option value="£">£</option>
                                        <option value="¥">¥</option>
                                    </select>
                                    <div class="input-group-append" >
                                        <span class="input-group-text" ></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="WW">Working Weeks Per Year</label>
                                <div class="input-group form-group">
                                    <input class="form-control" id="WW" type="number" min="0" max="52" placeholder=" For e.g  50"  data-toggle="tooltip"
                                    title="Number Of Weeks You Work in A Year?" onfocus="this.placeholder = ''" onblur="this.placeholder = 'For e.g 50'" oninput="rangeInput5.value=WW.value">
                                    <div class="input-group-append" >
                                        <span class="input-group-text" >weeks</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="OMB">Estimated Other Benefits Monthly</label>
                                <div class=" input-group form-group">
                                    <input class="form-control" id="OMB" type="number" min="0" placeholder=" For e.g  0.00$"
                                    data-toggle="tooltip" title="Other Monthly Benefits" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'For e.g 0$'"  oninput="rangeInput6.value=OMB.value">
                                    <div class="input-group-append" >
                                        <span class="input-group-text" id="cu4">$</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="submit"  id="flip" class="btn  btn-block" style="border-radius: 50px;background-color: #e9ecef;color: #000000" >Advance</button>
                            </div>
                            <div class="col-sm-6">
                                <input type="submit" class="btn  btn-block" style="border-radius: 50px; background-color: #3b77d7;color:#ffff;" onclick="showMessage()" value="Calculate">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Section Result Start -->
            <section>
                <div class="container">
                    <div class="row ba-section">
                        <div class="col-sm-6" id="inp-summary">

                            <div class="ba-table-head">
                                <h3>Input Summary</h3>
                            </div>
                            <div id="input-summary" class="ba-card ba-table">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Names</th>
                                            <th>Values</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">Period analyzed (years)</td>
                                            <td id="peroid"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Investment Name
                                            </td>
                                            <td id="IN"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                Description of Investment
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Value of your time ($/hour)</td>
                                            <td id="VT"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Working weeks per year</td>
                                            <td id="WPY"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">One-time Cost</td>
                                            <td id="MC"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Monthly Cost</td>
                                            <td id="TSW"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Time saved per week (minutes)</td>
                                            <td id="tpw"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Other Monthly Benefits</td>
                                            <td id="MB"></td>
                                        </tr>
                                    </tbody></table>
                                </div><br>
                                <div class="tables" >
                                    <div class="ba-table-head">
                                        <h3>Yearly Result</h3>
                                    </div>
                                    <table class="table table-bordered table-striped" id="tab1">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Costs</th>
                                                <th> Benefits</th>
                                                <th> Net Benefits</th>
                                                <th> Hours Saved</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table">
                                        </tbody>
                                    </table><br>
                                    <canvas id="myChart" width="80" height="50"></canvas>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div id="result">
                                    <div class="ba-table-head">
                                        <h3>Result Summary</h3>
                                    </div>

                                    <div class="ba-card card" id="result0">
                                        <div class="container result0 mb-2" id="results">
                                            <table class="table table-hover" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><h5 id="msg">&#8212;</h5></td>
                                                        <td><h5 id="roi"> ROI=?</h5></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="result2 ba-card ba-table">
                                            <table class="table table-hover mb-0" id="tab3">
                                                <thead>
                                                </thead>
                                                <tbody id="table2" class="bold">
                                                    <tr>
                                                        <th id="cu6">Return on Investment:</th>
                                                        <td id="6" class="rt">&#8212;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Annualized ROI:</th>
                                                        <td id="2" class="rt">&#8212;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Breakeven Period(months):</th>
                                                        <td id="3" class="rt">&#8212;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total hours saved:</th>
                                                        <td id="4" class="rt">&#8212;</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Annual hours saved (average):</th>
                                                        <td id="5" class="rt">&#8212;</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="tables">
                                    <div class="ba-table-head">
                                        <h3>Monthly Result</h3>
                                    </div>
                                    <table class="table table-bordered table-striped" id="tab2">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th> Costs</th>
                                                <th> Benefits</th>
                                                <th> Net Benefits</th>
                                                <th> Hours Saved</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table1">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="printbutton"  onclick="window.print();"><img src="http://simpleicon.com/wp-content/uploads/printer-6.png" alt="" style="width:30px;height: 30px; float: right;"
                    ></span>
                <!-- Start Table -->
            </section>


            <!-- .ROI Calculator -->
        </main><!-- .site-main -->
        



        </div><!-- .content-area -->

        <?php get_footer(); ?>