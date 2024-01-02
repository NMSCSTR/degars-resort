<?php
                                    function shortenUrl($longUrl, $accessToken) {
                                        $apiUrl = 'https://api-ssl.bitly.com/v4/shorten';

                                        $headers = [
                                            'Content-Type: application/json',
                                            'Authorization: Bearer ' . $accessToken,
                                        ];

                                        $data = [
                                            'long_url' => $longUrl,
                                        ];

                                        $ch = curl_init($apiUrl);

                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

                                        $response = curl_exec($ch);

                                        if ($response === false) {
                                            echo 'Curl error: ' . curl_error($ch);
                                            return false;
                                        }

                                        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                                        curl_close($ch);

                                        $body = json_decode($response, true);

                                        if ($statusCode == 200 && isset($body['id'])) {
                                            return $body['id']; // Shortened URL
                                        } else {
                                            echo 'API Response Error: ' . print_r($body, true);
                                            return false; // Unable to shorten URL
                                        }
                                    }

                                    // Replace 'YOUR_ACCESS_TOKEN' with your actual Bitly OAuth token
                                    $accessToken = '3f8a13975d5644367cbebe8b93c83054402a2fc0';

                                    // Initialize the long URL variable
                                    $longUrl = '';

                                    // Check if the form is submitted
                                    // Check if the form is submitted
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['long_url'])) {
                                        // Get the long URL from the form
                                        $longUrl = $_POST['long_url'];

                                        // Call the function to shorten the URL
                                        $shortUrl = shortenUrl($longUrl, $accessToken);

                                        if ($shortUrl) {
                                            // Update the long URL variable with the shortened URL
                                            $longUrl = $shortUrl;
                                            $_SESSION['status'] = "Link Shortened Successfully";
                                            $_SESSION['code'] = "success";

                                            // Display the shortened URL in the input field
                                            echo '<script>';
                                            echo 'document.getElementById("long_url").value = "' . htmlspecialchars($shortUrl) . '";';
                                            echo '</script>';
                                        } else {
                                            echo 'Failed to shorten URL.';
                                        }
                                    }

                                    ?>