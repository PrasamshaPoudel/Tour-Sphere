<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Booking - Tour Sphere</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .card-shadow {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .input-focus:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
        }
        .btn-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
        }
        .price-glow {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }
    </style>
</head>
<body class="gradient-bg min-h-screen">
    <div class="min-h-screen py-8 px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-full mb-4 shadow-lg">
                    <i class="fas fa-mountain text-2xl text-indigo-600"></i>
                </div>
                <h1 class="text-4xl font-bold text-white mb-3">Quick Booking</h1>
                <p class="text-indigo-100 text-lg">Book your adventure in just a few clicks</p>
            </div>

            <!-- Main Card -->
            <div class="bg-white rounded-2xl card-shadow p-8 md:p-12">
                <!-- Destination Selector -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-2xl p-8 mb-10 border border-indigo-100">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-map-marker-alt text-indigo-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">Choose Your Adventure</h2>
                    </div>
                    
                    <!-- Destination Dropdown -->
                    <div class="mb-6">
                        <label for="destination_select" class="block text-sm font-bold text-gray-700 mb-3">
                            <i class="fas fa-globe mr-2 text-indigo-600"></i>Select Destination
                        </label>
                        <select id="destination_select" class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:outline-none input-focus transition-all duration-200">
                            <option value="1" data-name="Everest Base Camp Trek" data-description="Experience the world's most famous trek to the base of Mount Everest. This 12-14 day adventure takes you through stunning mountain scenery and traditional Sherpa villages." data-price="80000">Everest Base Camp Trek - Rs 80,000</option>
                            <option value="2" data-name="Annapurna Circuit Trek" data-description="Discover the legendary Annapurna Circuit, one of the world's best trekking routes. Experience diverse landscapes from subtropical forests to high-altitude deserts." data-price="70000">Annapurna Circuit Trek - Rs 70,000</option>
                            <option value="3" data-name="Langtang Valley Trek" data-description="Explore the beautiful Langtang Valley with its stunning mountain views, traditional Tamang villages, and diverse wildlife. A perfect introduction to trekking in Nepal." data-price="45000">Langtang Valley Trek - Rs 45,000</option>
                            <option value="4" data-name="Manaslu Circuit Trek" data-description="Discover the remote and pristine Manaslu region. This challenging trek offers incredible mountain views and authentic cultural experiences." data-price="75000">Manaslu Circuit Trek - Rs 75,000</option>
                            <option value="5" data-name="Upper Mustang Trek" data-description="Journey to the ancient Kingdom of Mustang, a hidden gem with unique Tibetan culture, ancient monasteries, and dramatic desert landscapes." data-price="90000">Upper Mustang Trek - Rs 90,000</option>
                            <option value="6" data-name="Pokhara Adventure Package" data-description="Enjoy paragliding, boating, and mountain views in Nepal's adventure capital. Perfect for thrill-seekers and nature lovers." data-price="15000">Pokhara Adventure Package - Rs 15,000</option>
                            <option value="7" data-name="Chitwan Wildlife Safari" data-description="Explore Nepal's first national park and spot rhinos, tigers, and elephants in their natural habitat. A perfect family adventure." data-price="12000">Chitwan Wildlife Safari - Rs 12,000</option>
                            <option value="8" data-name="Lumbini Spiritual Tour" data-description="Visit the birthplace of Buddha and explore ancient monasteries and temples. A peaceful and spiritual journey." data-price="8000">Lumbini Spiritual Tour - Rs 8,000</option>
                            <option value="9" data-name="Trishuli River Rafting" data-description="Experience exciting white water rafting on the Trishuli River. Perfect for adventure enthusiasts of all levels." data-price="4000">Trishuli River Rafting - Rs 4,000</option>
                            <option value="10" data-name="Bungee Jumping Adventure" data-description="Take the ultimate leap of faith with bungee jumping from one of the world's highest bungee spots. An adrenaline-pumping experience you'll never forget." data-price="6000">Bungee Jumping Adventure - Rs 6,000</option>
                            <option value="11" data-name="Paragliding in Pokhara" data-description="Soar above the beautiful Pokhara valley with stunning views of the Annapurna range and Phewa Lake. A once-in-a-lifetime experience." data-price="8000">Paragliding in Pokhara - Rs 8,000</option>
                            <option value="12" data-name="Mountain Biking Tour" data-description="Explore Nepal's diverse landscapes on two wheels. From Kathmandu valley to remote mountain trails, experience the country like never before." data-price="18000">Mountain Biking Tour - Rs 18,000</option>
                            <option value="13" data-name="Helicopter Tour to Everest" data-description="Get a bird's eye view of Mount Everest and the surrounding peaks with this spectacular helicopter tour. Perfect for those with limited time." data-price="25000">Helicopter Tour to Everest - Rs 25,000</option>
                            <option value="14" data-name="Cultural Heritage Tour" data-description="Discover Nepal's rich cultural heritage through ancient temples, palaces, and traditional villages. A perfect blend of history and culture." data-price="10000">Cultural Heritage Tour - Rs 10,000</option>
                            <option value="15" data-name="Yoga and Meditation Retreat" data-description="Find inner peace and wellness in the serene mountains of Nepal. A perfect retreat for mind, body, and soul rejuvenation." data-price="20000">Yoga and Meditation Retreat - Rs 20,000</option>
                            <option value="16" data-name="Seti River Rafting" data-description="Experience thrilling white water rafting on the Seti River with beautiful scenery and exciting rapids. Perfect for adventure enthusiasts." data-price="5000">Seti River Rafting - Rs 5,000</option>
                            <option value="17" data-name="Kali Gandaki River Rafting" data-description="Navigate through the challenging rapids of Kali Gandaki River with stunning mountain views and exciting white water adventure." data-price="7000">Kali Gandaki River Rafting - Rs 7,000</option>
                        </select>
                    </div>
                    
                    <!-- Selected Destination Display -->
                    <div id="destination_display" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <h3 id="dest_name" class="font-bold text-2xl text-indigo-900 mb-3">Everest Base Camp Trek</h3>
                            <p id="dest_description" class="text-gray-700 text-lg leading-relaxed">Experience the world's most famous trek to the base of Mount Everest. This 12-14 day adventure takes you through stunning mountain scenery and traditional Sherpa villages.</p>
                            <div class="flex items-center mt-4">
                                <i class="fas fa-star text-yellow-400 mr-2"></i>
                                <span class="text-gray-600 font-medium">Premium Adventure Experience</span>
                            </div>
                        </div>
                        <div class="text-center lg:text-right">
                            <div class="inline-block price-glow text-white px-6 py-4 rounded-2xl">
                                <div id="dest_price" class="text-3xl font-bold">Rs 80,000</div>
                                <div class="text-indigo-100 text-sm font-medium">per person</div>
                            </div>
                            <div class="mt-4">
                                <div class="flex items-center justify-center lg:justify-end text-gray-600">
                                    <i class="fas fa-clock mr-2"></i>
                                    <span>Instant Confirmation</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <form id="bookingForm" class="space-y-8">
                    <!-- Travel Details Section -->
                    <div class="bg-gray-50 rounded-2xl p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-calendar-alt text-indigo-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Travel Details</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="travel_date" class="block text-sm font-bold text-gray-700 mb-3">
                                    <i class="fas fa-calendar mr-2 text-indigo-600"></i>Travel Date
                                </label>
                                <input type="date" id="travel_date" name="travel_date" 
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:outline-none input-focus transition-all duration-200"
                                       required>
                            </div>
                            <div>
                                <label for="num_people" class="block text-sm font-bold text-gray-700 mb-3">
                                    <i class="fas fa-users mr-2 text-indigo-600"></i>Number of People
                                </label>
                                <input type="number" id="num_people" name="num_people" min="1" value="1"
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:outline-none input-focus transition-all duration-200"
                                       required>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Details Section -->
                    <div class="bg-gray-50 rounded-2xl p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-user text-indigo-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Personal Details</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-bold text-gray-700 mb-3">
                                    <i class="fas fa-user mr-2 text-indigo-600"></i>Full Name
                                </label>
                                <input type="text" id="name" name="name" 
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:outline-none input-focus transition-all duration-200"
                                       required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-gray-700 mb-3">
                                    <i class="fas fa-envelope mr-2 text-indigo-600"></i>Email Address
                                </label>
                                <input type="email" id="email" name="email" 
                                       class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:outline-none input-focus transition-all duration-200"
                                       required>
                            </div>
                        </div>
                        <div class="mt-6">
                            <label for="phone" class="block text-sm font-bold text-gray-700 mb-3">
                                <i class="fas fa-phone mr-2 text-indigo-600"></i>Phone Number
                            </label>
                            <input type="tel" id="phone" name="phone" 
                                   class="w-full px-4 py-4 border-2 border-gray-200 rounded-xl focus:border-indigo-500 focus:outline-none input-focus transition-all duration-200"
                                   required>
                        </div>
                    </div>

                    <!-- Price Summary Section -->
                    <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-8 border border-green-100">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-calculator text-green-600"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Price Summary</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center py-3 px-4 bg-white rounded-xl">
                                <span class="text-gray-700 font-medium">Price per person:</span>
                                <span class="text-lg font-bold text-gray-900">Rs 80,000</span>
                            </div>
                            <div class="flex justify-between items-center py-3 px-4 bg-white rounded-xl">
                                <span class="text-gray-700 font-medium">Number of people:</span>
                                <span id="people_count" class="text-lg font-bold text-indigo-600">1</span>
                            </div>
                            <div class="border-t-2 border-green-200 my-4"></div>
                            <div class="flex justify-between items-center py-4 px-6 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl text-white">
                                <span class="text-xl font-bold">Total Amount:</span>
                                <span id="total_display" class="text-2xl font-bold">Rs 80,000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-6">
                        <button type="submit" id="submitBtn"
                                class="w-full bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-bold py-5 px-8 rounded-2xl transition-all duration-300 btn-hover text-lg">
                            <span id="btnText" class="flex items-center justify-center">
                                <i class="fas fa-check-circle mr-3"></i>
                                Complete Booking
                            </span>
                            <span id="btnLoading" class="hidden flex items-center justify-center">
                                <i class="fas fa-spinner fa-spin mr-3"></i>
                                Processing...
                            </span>
                        </button>
                        <p class="text-center text-gray-500 text-sm mt-4">
                            <i class="fas fa-shield-alt mr-2"></i>
                            This is a demo form - no actual booking will be processed
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Get URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        const destinationId = urlParams.get('destination_id');
        const destinationTitle = urlParams.get('destination_title');
        const destinationPrice = urlParams.get('price');
        const destinationDescription = urlParams.get('description');

        // Initialize page with URL parameters if available
        document.addEventListener('DOMContentLoaded', function() {
            if (destinationTitle && destinationPrice) {
                // Update destination display with URL parameters
                document.getElementById('dest_name').textContent = destinationTitle;
                document.getElementById('dest_description').textContent = destinationDescription || 'An amazing adventure awaits you!';
                document.getElementById('dest_price').textContent = 'Rs ' + parseInt(destinationPrice).toLocaleString();
                
                // Update price summary
                updatePriceSummary(parseInt(destinationPrice));
                
                // Find and select the matching option in dropdown
                const select = document.getElementById('destination_select');
                for (let i = 0; i < select.options.length; i++) {
                    if (select.options[i].dataset.name === destinationTitle) {
                        select.selectedIndex = i;
                        break;
                    }
                }
            }
        });

        // Handle destination selection
        document.getElementById('destination_select').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const destName = selectedOption.dataset.name;
            const destDescription = selectedOption.dataset.description;
            const destPrice = parseInt(selectedOption.dataset.price);
            
            // Update destination display
            document.getElementById('dest_name').textContent = destName;
            document.getElementById('dest_description').textContent = destDescription;
            document.getElementById('dest_price').textContent = 'Rs ' + destPrice.toLocaleString();
            
            // Update price summary
            updatePriceSummary(destPrice);
        });
        
        // Calculate total when number of people changes
        document.getElementById('num_people').addEventListener('input', function() {
            const pricePerPerson = parseInt(document.getElementById('dest_price').textContent.replace(/[^\d]/g, ''));
            const numPeople = parseInt(this.value) || 1;
            const total = pricePerPerson * numPeople;
            
            updatePriceSummary(total);
        });
        
        // Update price summary function
        function updatePriceSummary(total) {
            const peopleCount = document.getElementById('people_count');
            const totalDisplay = document.getElementById('total_display');
            const numPeople = parseInt(document.getElementById('num_people').value) || 1;
            
            // Add animation class
            peopleCount.style.transform = 'scale(1.1)';
            totalDisplay.style.transform = 'scale(1.1)';
            
            setTimeout(() => {
                peopleCount.textContent = numPeople;
                totalDisplay.textContent = 'Rs ' + total.toLocaleString();
                peopleCount.style.transform = 'scale(1)';
                totalDisplay.style.transform = 'scale(1)';
            }, 150);
        }

        // Handle form submission (demo only)
        document.getElementById('bookingForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnLoading = document.getElementById('btnLoading');
            
            // Show loading state
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.classList.add('hidden');
            btnLoading.classList.remove('hidden');
            
            // Simulate processing
            setTimeout(() => {
                // Show success state
                submitBtn.classList.remove('bg-gradient-to-r', 'from-indigo-600', 'to-purple-600');
                submitBtn.classList.add('bg-green-500');
                btnLoading.innerHTML = '<i class="fas fa-check mr-3"></i>Demo Complete!';
                
                // Show demo message
                alert('This is a demo form! No actual booking was processed. In a real application, this would submit your booking details.');
                
                // Reset form after 3 seconds
                setTimeout(() => {
                    document.getElementById('bookingForm').reset();
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-75', 'cursor-not-allowed', 'bg-green-500');
                    submitBtn.classList.add('bg-gradient-to-r', 'from-indigo-600', 'to-purple-600');
                    btnText.classList.remove('hidden');
                    btnLoading.classList.add('hidden');
                    
                    // Reset destination display
                    document.getElementById('dest_name').textContent = 'Everest Base Camp Trek';
                    document.getElementById('dest_description').textContent = 'Experience the world\'s most famous trek to the base of Mount Everest. This 12-14 day adventure takes you through stunning mountain scenery and traditional Sherpa villages.';
                    document.getElementById('dest_price').textContent = 'Rs 80,000';
                    document.getElementById('people_count').textContent = '1';
                    document.getElementById('total_display').textContent = 'Rs 80,000';
                }, 3000);
            }, 2000);
        });

        // Add smooth scrolling and focus effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to inputs
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('ring-2', 'ring-indigo-200');
                });
                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('ring-2', 'ring-indigo-200');
                });
            });
        });
    </script>
</body>
</html>
