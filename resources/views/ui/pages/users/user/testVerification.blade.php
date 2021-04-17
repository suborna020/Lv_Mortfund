

    <section class="payment-integration py-5">
        <div class="containers">
            <div class="progress-barkyc">
                <div class="step">
                    <p></p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p></p>
                    <div class="bullet">
                        <span>2</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
                <div class="step">
                    <p></p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="check fas fa-check"></div>
                </div>
            </div>



            <div class="form-outer">
                <form action="{{url('testVerification')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                    <!-- 1st Step -->
                    <div class="page slide-page">
                        <div style="width: 400px; text-align: center">
                            <header>KYC Verification</header>
                            <p>
                                Before we take you to your dashboard, we want to verify your
                                identity
                            </p>
                        </div>
                        <div class="custom-select field" style="width: 400px" ;>
                            <select name="identity_card_type">
                                <option value="0">Select Verification Process</option>
                                <option value="1">Government ID</option>
                                <option value="2">National ID</option>
                                <option value="3">Passport Number</option>
                                <option value="4">Voter ID</option>
                                <option value="5">Driving License Number</option>
                            </select>
                        </div>

                        <div class="field input-icons" style="width: 400px">
                            <input placeholder="Enter Number" type="text" name="identity_number" required="required" />
                            <i class="fas fa-id-card"></i>
                        </div>

                        <div class="field btns" style="width: 400px">
                            <button class="prev">&#8249; Back</button>
                            <button class="firstNext next">Next &#8250;</button>
                        </div>
                    </div>

                    <!-- 2nd Step -->
                    <div class="page">
                        <div style="width: 400px; text-align: center; right: 13%;">
                            <header>Upload your verification document</header>
                        </div>

                        <div class="dropzone">
                            <img src="https://img.icons8.com/fluent-systems-filled/48/ffffff/file-upload.png"
                                class="upload-icon" onclick="move()" />
                            <input style="font-size: 15px" type="file" id="myFile" class="upload-input" name="upload_documents" required="required" />
                        </div>

                        <div class="field btns" style="width: 400px;">
                            <button class="prev-1 prev">&#8249; Back</button>
                            <button class="next-1 next">Next &#8250;</button>
                        </div>
                    </div>

                    <!-- 3rd Step -->
                    <div class="page">
                        <div style="width: 400px; text-align: center">
                            <header>Face Recognition</header>
                            <p>
                                Please take your picture and submit to complete the process
                            </p>
                        </div>

                        <div class="row" style="width: 400px;">
                            <div class="column" id="camera" style="height:150px;width:150px; text-align:right;"></div>

                            <div class="column" style="height:50px;width:50px;">
                                <input type="button" value="Take a picture" name="upload_snapshot" id="btPic" onclick="takeSnapShot()" required="required" />
                                <p id="snapShot"></p> 
                                <input type="hidden" name="image" id="snapShot" class="image">
                            </div>
                        </div>

                        <div class="field btns" style="width: 400px;">
                            <button class="prev-2 prev">&#8249; Back</button>
                            <button type="submit" class="submit">Next &#8250;</button>
                        </div>
                    </div>

                   <!--  Final Step -->
                    {{-- <div class="page">
                        <div style="text-align: left; margin-bottom: 15px;">
                            <header>Verification Successful!</header>
                            <!-- <p>
                                                                                                                                                                                                                                                                                                                                                                                                          The biometric data of your photo matches with your document photo
                                                                                                                                                                                                                                                                                                                                                                                                        </p> -->
                        </div>
                        <br />
                        <div class="card">
                            <div class="grid-container">
                                <div class="grid-item">
                                    <img src="{{ asset('images/demo.png') }}" alt="user"
                                        style="width:90%; border-radius: 50%;">
                                </div>
                                <div class="grid-item">
                                    <h6 style="color: grey;">Name</h6>
                                    <p style="color: black;">xyz</p>
                                </div>

                                <div class="grid-item">
                                    <h6 style="color: grey;">Identification Number</h6>
                                    <p style="color: black;">EA123456</p>
                                </div>


                                <div class="grid-item">
                                    <h6 style="color: grey;">Nationality</h6>
                                    <p style="color: black;">EA123456</p>
                                </div>
                                <div class="grid-item">
                                    <h6 style="color: grey;">Issue Date</h6>
                                    <p style="color: black;">13-04-2021</p>

                                </div>

                                <div class="grid-item">
                                    <h6 style="color: grey;">Expiry Date</h6>
                                    <p style="color: black; ">13-04-2021</p>

                                </div>

                            </div>
                        </div> --}}

                        <div class="field btns" style="right: -5%; top: -5%;">
                            <button class="prev-3 prev">&#8249; Back</button>
                            <button type="submit" class="submit">Next &#8250;</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </section>

   

<script src="{{ asset('js/kyc.js') }}"></script>
    <script src="{{ asset('js/camera.js') }}"></script>