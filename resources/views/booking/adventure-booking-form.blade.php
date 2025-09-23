@extends('layouts.app')

@section('title', 'Book Your Adventure - Tour Sphere Nepal')

@section('content')
<style>
/* Adventure Booking Form Styles */
.adventure-booking-container {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    padding: 2rem 0;
}

.booking-card {
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 0 auto;
    max-width: 1200px;
}

.booking-header {
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    color: white;
    padding: 2rem;
    text-align: center;
}

.booking-header h1 {
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.booking-header p {
    font-size: 1.2rem;
    opacity: 0.9;
}

.destination-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
}

.destination-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border: 2px solid transparent;
    position: relative;
}

.destination-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
}

.destination-card.selected {
    border-color: #4f46e5;
    box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
}

.destination-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    background: linear-gradient(45deg, #f3f4f6, #e5e7eb);
}

.destination-content {
    padding: 1.5rem;
}

.destination-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #1f2937;
    margin-bottom: 0.5rem;
}

.destination-description {
    color: #6b7280;
    font-size: 0.95rem;
    margin-bottom: 1rem;
    line-height: 1.5;
}

.budget-badge {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 1rem;
}

.budget-low {
    background: #dcfce7;
    color: #166534;
}

.budget-medium {
    background: #fef3c7;
    color: #92400e;
}

.budget-expensive {
    background: #fce7f3;
    color: #be185d;
}

.price-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.price-per-person {
    font-size: 1.25rem;
    font-weight: bold;
    color: #1f2937;
}

.quantity-section {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.quantity-label {
    font-size: 0.9rem;
    color: #6b7280;
    font-weight: 500;
}

.quantity-input {
    width: 60px;
    padding: 0.5rem;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    text-align: center;
    font-weight: 600;
    transition: all 0.2s ease;
}

.quantity-input:focus {
    outline: none;
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.total-price {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
    padding: 0.75rem 1rem;
    border-radius: 12px;
    font-weight: bold;
    font-size: 1.1rem;
    text-align: center;
    margin-top: 1rem;
}

.booking-summary {
    background: #f8fafc;
    padding: 2rem;
    border-top: 1px solid #e5e7eb;
}

.summary-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #1f2937;
    margin-bottom: 1.5rem;
    text-align: center;
}

.summary-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.summary-item {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
}

.summary-item h3 {
    font-size: 1.1rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
}

.summary-item p {
    color: #6b7280;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.summary-price {
    font-size: 1.25rem;
    font-weight: bold;
    color: #059669;
}

.booking-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary {
    background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
    color: white;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    font-size: 1.1rem;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
}

.btn-secondary {
    background: white;
    color: #4f46e5;
    padding: 1rem 2rem;
    border-radius: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid #4f46e5;
    cursor: pointer;
    font-size: 1.1rem;
}

.btn-secondary:hover {
    background: #4f46e5;
    color: white;
    transform: translateY(-2px);
}

.selected-indicator {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: #10b981;
    color: white;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: bold;
}

@media (max-width: 768px) {
    .destination-grid {
        grid-template-columns: 1fr;
        padding: 1rem;
    }
    
    .booking-header h1 {
        font-size: 2rem;
    }
    
    .summary-content {
        grid-template-columns: 1fr;
    }
    
    .booking-actions {
        flex-direction: column;
        align-items: center;
    }
    
    .btn-primary,
    .btn-secondary {
        width: 100%;
        max-width: 300px;
    }
}
</style>

<div class="adventure-booking-container">
    <div class="booking-card">
        <!-- Header -->
        <div class="booking-header">
            <h1>Choose Your Adventure</h1>
            <p>Select your preferred destination and customize your booking</p>
        </div>

        <!-- Destination Selection -->
        <div class="destination-grid" id="destinationGrid">
            <!-- Mardi Himal Trek -->
            <div class="destination-card" data-destination="7" data-price="20000">
                <img src="{{ asset('images/annapurnabasecamp.jpg') }}" alt="Mardi Himal Trek" class="destination-image" onerror="this.src='https://via.placeholder.com/300x200/4f46e5/ffffff?text=Mardi+Himal+Trek'">
                <div class="destination-content">
                    <h3 class="destination-title">Mardi Himal Trek</h3>
                    <p class="destination-description">A hidden gem offering spectacular views of the Annapurna range and Machhapuchhre (Fishtail) peak.</p>
                    <span class="budget-badge budget-medium">Medium Budget</span>
                    <div class="price-section">
                        <span class="price-per-person">Rs 20,000</span>
                        <div class="quantity-section">
                            <span class="quantity-label">Travelers:</span>
                            <input type="number" class="quantity-input" min="1" max="10" value="1" data-quantity="mardi-himal">
                        </div>
                    </div>
                    <div class="total-price" data-total="mardi-himal">Total: Rs 20,000</div>
                </div>
            </div>

            <!-- Everest Base Camp -->
            <div class="destination-card" data-destination="4" data-price="120000">
                <img src="{{ asset('images/everest.jpg') }}" alt="Everest Base Camp" class="destination-image" onerror="this.src='https://via.placeholder.com/300x200/7c3aed/ffffff?text=Everest+Base+Camp'">
                <div class="destination-content">
                    <h3 class="destination-title">Everest Base Camp</h3>
                    <p class="destination-description">The ultimate trekking experience to the base of the world's highest mountain.</p>
                    <span class="budget-badge budget-expensive">Expensive</span>
                    <div class="price-section">
                        <span class="price-per-person">Rs 120,000</span>
                        <div class="quantity-section">
                            <span class="quantity-label">Travelers:</span>
                            <input type="number" class="quantity-input" min="1" max="10" value="1" data-quantity="everest-base-camp">
                        </div>
                    </div>
                    <div class="total-price" data-total="everest-base-camp">Total: Rs 120,000</div>
                </div>
            </div>

            <!-- Annapurna Circuit -->
            <div class="destination-card" data-destination="5" data-price="80000">
                <img src="{{ asset('images/annapurnabasecamp.jpg') }}" alt="Annapurna Circuit" class="destination-image" onerror="this.src='https://via.placeholder.com/300x200/10b981/ffffff?text=Annapurna+Circuit'">
                <div class="destination-content">
                    <h3 class="destination-title">Annapurna Circuit</h3>
                    <p class="destination-description">A diverse trek through varied landscapes, cultures, and climates around the Annapurna massif.</p>
                    <span class="budget-badge budget-expensive">Expensive</span>
                    <div class="price-section">
                        <span class="price-per-person">Rs 80,000</span>
                        <div class="quantity-section">
                            <span class="quantity-label">Travelers:</span>
                            <input type="number" class="quantity-input" min="1" max="10" value="1" data-quantity="annapurna-circuit">
                        </div>
                    </div>
                    <div class="total-price" data-total="annapurna-circuit">Total: Rs 80,000</div>
                </div>
            </div>

            <!-- Pokhara Paragliding -->
            <div class="destination-card" data-destination="6" data-price="12000">
                <img src="{{ asset('images/paragliding.jpg') }}" alt="Pokhara Paragliding" class="destination-image" onerror="this.src='https://via.placeholder.com/300x200/f59e0b/ffffff?text=Pokhara+Paragliding'">
                <div class="destination-content">
                    <h3 class="destination-title">Pokhara Paragliding</h3>
                    <p class="destination-description">Soar above Phewa Lake with breathtaking views of the Annapurna and Dhaulagiri ranges.</p>
                    <span class="budget-badge budget-low">Low Budget</span>
                    <div class="price-section">
                        <span class="price-per-person">Rs 12,000</span>
                        <div class="quantity-section">
                            <span class="quantity-label">Travelers:</span>
                            <input type="number" class="quantity-input" min="1" max="10" value="1" data-quantity="pokhara-paragliding">
                        </div>
                    </div>
                    <div class="total-price" data-total="pokhara-paragliding">Total: Rs 12,000</div>
                </div>
            </div>

            <!-- Chitwan Safari -->
            <div class="destination-card" data-destination="15" data-price="15000">
                <img src="{{ asset('images/chitwan.jpg') }}" alt="Chitwan Safari" class="destination-image" onerror="this.src='https://via.placeholder.com/300x200/ef4444/ffffff?text=Chitwan+Safari'">
                <div class="destination-content">
                    <h3 class="destination-title">Chitwan Safari</h3>
                    <p class="destination-description">Wildlife safari adventure with rhinos, tigers, elephants, and diverse bird species.</p>
                    <span class="budget-badge budget-low">Low Budget</span>
                    <div class="price-section">
                        <span class="price-per-person">Rs 15,000</span>
                        <div class="quantity-section">
                            <span class="quantity-label">Travelers:</span>
                            <input type="number" class="quantity-input" min="1" max="10" value="1" data-quantity="chitwan-safari">
                        </div>
                    </div>
                    <div class="total-price" data-total="chitwan-safari">Total: Rs 15,000</div>
                </div>
            </div>

            <!-- Upper Mustang -->
            <div class="destination-card" data-destination="14" data-price="100000">
                <img src="{{ asset('images/mustang.jpg') }}" alt="Upper Mustang" class="destination-image" onerror="this.src='https://via.placeholder.com/300x200/8b5cf6/ffffff?text=Upper+Mustang'">
                <div class="destination-content">
                    <h3 class="destination-title">Upper Mustang</h3>
                    <p class="destination-description">Explore the forbidden kingdom with Tibetan culture and desert landscapes.</p>
                    <span class="budget-badge budget-expensive">Expensive</span>
                    <div class="price-section">
                        <span class="price-per-person">Rs 100,000</span>
                        <div class="quantity-section">
                            <span class="quantity-label">Travelers:</span>
                            <input type="number" class="quantity-input" min="1" max="10" value="1" data-quantity="upper-mustang">
                        </div>
                    </div>
                    <div class="total-price" data-total="upper-mustang">Total: Rs 100,000</div>
                </div>
            </div>
        </div>

        <!-- Booking Summary -->
        <div class="booking-summary" id="bookingSummary" style="display: none;">
            <h2 class="summary-title">Booking Summary</h2>
            <div class="summary-content">
                <div class="summary-item">
                    <h3>Selected Destination</h3>
                    <p id="selectedDestinationName">-</p>
                    <p id="selectedDestinationDescription">-</p>
                </div>
                <div class="summary-item">
                    <h3>Pricing Details</h3>
                    <p>Price per person: <span id="summaryPricePerPerson">-</span></p>
                    <p>Number of travelers: <span id="summaryTravelers">-</span></p>
                    <div class="summary-price" id="summaryTotalPrice">Total: Rs 0</div>
                </div>
            </div>
            <div class="booking-actions">
                <button class="btn-primary" id="proceedToBooking">Proceed to Booking Form</button>
                <button class="btn-secondary" id="changeSelection">Change Selection</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const destinationCards = document.querySelectorAll('.destination-card');
    const quantityInputs = document.querySelectorAll('.quantity-input');
    const bookingSummary = document.getElementById('bookingSummary');
    const proceedBtn = document.getElementById('proceedToBooking');
    const changeBtn = document.getElementById('changeSelection');
    
    let selectedDestination = null;

    // Handle destination selection
    destinationCards.forEach(card => {
        card.addEventListener('click', function() {
            // Remove previous selection
            destinationCards.forEach(c => c.classList.remove('selected'));
            
            // Add selection to clicked card
            this.classList.add('selected');
            
            // Update selected destination
            selectedDestination = {
                name: this.querySelector('.destination-title').textContent,
                description: this.querySelector('.destination-description').textContent,
                price: parseInt(this.dataset.price),
                destination: this.dataset.destination,
                quantity: parseInt(this.querySelector('.quantity-input').value)
            };
            
            // Update summary
            updateBookingSummary();
            bookingSummary.style.display = 'block';
        });
    });

    // Handle quantity changes
    quantityInputs.forEach(input => {
        input.addEventListener('input', function() {
            const card = this.closest('.destination-card');
            const price = parseInt(card.dataset.price);
            const quantity = parseInt(this.value) || 1;
            const total = price * quantity;
            
            // Update total display
            card.querySelector('[data-total]').textContent = `Total: Rs ${total.toLocaleString()}`;
            
            // Update selected destination if this card is selected
            if (card.classList.contains('selected') && selectedDestination) {
                selectedDestination.quantity = quantity;
                updateBookingSummary();
            }
        });
    });

    // Update booking summary
    function updateBookingSummary() {
        if (!selectedDestination) return;
        
        document.getElementById('selectedDestinationName').textContent = selectedDestination.name;
        document.getElementById('selectedDestinationDescription').textContent = selectedDestination.description;
        document.getElementById('summaryPricePerPerson').textContent = `Rs ${selectedDestination.price.toLocaleString()}`;
        document.getElementById('summaryTravelers').textContent = selectedDestination.quantity;
        
        const total = selectedDestination.price * selectedDestination.quantity;
        document.getElementById('summaryTotalPrice').textContent = `Total: Rs ${total.toLocaleString()}`;
    }

    // Proceed to booking form
    proceedBtn.addEventListener('click', function() {
        if (!selectedDestination) return;
        
        // Create booking URL with parameters
        const params = new URLSearchParams({
            destination_id: selectedDestination.destination,
            destination_title: selectedDestination.name,
            price: selectedDestination.price,
            quantity: selectedDestination.quantity,
            total_amount: selectedDestination.price * selectedDestination.quantity
        });
        
        // Redirect to booking form
        window.location.href = `{{ route('booking.form') }}?${params.toString()}`;
    });

    // Change selection
    changeBtn.addEventListener('click', function() {
        bookingSummary.style.display = 'none';
        destinationCards.forEach(c => c.classList.remove('selected'));
        selectedDestination = null;
    });

    // Auto-select based on URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');
    const destination = urlParams.get('destination');
    const priceRange = urlParams.get('price_range');
    
    if (destination) {
        // Try to find matching destination
        const matchingCard = Array.from(destinationCards).find(card => 
            card.querySelector('.destination-title').textContent.toLowerCase().includes(destination.toLowerCase())
        );
        
        if (matchingCard) {
            matchingCard.click();
        }
    }
});
</script>
@endsection






