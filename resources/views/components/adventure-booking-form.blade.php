@props([
    'destinations' => [],
    'category' => 'Trekking',
    'priceRange' => '15000 - 25000',
    'selectedDestination' => null
])

<div class="adventure-booking-container">
    <!-- Header Section -->
    <div class="booking-header">
        <div class="booking-icon">
            <i class="fas fa-mountain"></i>
        </div>
        <h2 class="booking-title">Book Your <span class="highlight">Adventure</span></h2>
        <p class="booking-subtitle">Secure your spot for an unforgettable experience</p>
    </div>

    <!-- Destination Selection Grid -->
    <div class="destinations-grid">
        @foreach($destinations as $destination)
            <div class="destination-card" data-destination-id="{{ $destination->id }}" data-price="{{ $destination->price }}">
                <div class="destination-image">
                    <img src="{{ $destination->image ?? 'images/default-destination.jpg' }}" alt="{{ $destination->name }}">
                    <div class="budget-badge budget-{{ strtolower($destination->budget_category ?? 'medium') }}">
                        {{ $destination->budget_category ?? 'Medium' }}
                    </div>
                </div>
                
                <div class="destination-content">
                    <h3 class="destination-name">{{ $destination->name }}</h3>
                    <p class="destination-description">{{ $destination->description }}</p>
                    
                    <div class="destination-details">
                        <div class="detail-item">
                            <i class="fas fa-clock"></i>
                            <span>{{ $destination->duration ?? '3-5 days' }}</span>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-users"></i>
                            <span>{{ $destination->group_size ?? '2-12 people' }}</span>
                        </div>
                    </div>
                    
                    <div class="pricing-section">
                        <div class="price-display">
                            <span class="price-label">From</span>
                            <span class="price-amount">Rs {{ number_format($destination->price) }}</span>
                            <span class="price-unit">per person</span>
                        </div>
                        
                        <div class="quantity-selector">
                            <label class="quantity-label">Travelers:</label>
                            <div class="quantity-controls">
                                <button type="button" class="quantity-btn quantity-minus" data-action="decrease">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" class="quantity-input" value="1" min="1" max="20" data-destination="{{ $destination->id }}">
                                <button type="button" class="quantity-btn quantity-plus" data-action="increase">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="total-price">
                            <span class="total-label">Total:</span>
                            <span class="total-amount" data-destination="{{ $destination->id }}">Rs {{ number_format($destination->price) }}</span>
                        </div>
                    </div>
                    
                    <button class="book-now-btn" data-destination="{{ $destination->id }}">
                        <i class="fas fa-calendar-check"></i>
                        Book Now
                    </button>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Booking Summary Modal -->
    <div class="booking-modal" id="bookingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Complete Your Booking</h3>
                <button class="modal-close" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <div class="modal-body">
                <div class="selected-destination-info" id="selectedDestinationInfo">
                    <!-- Will be populated by JavaScript -->
                </div>
                
                <form class="booking-form" id="bookingForm" action="{{ route('book.adventure.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="destination_id" id="selectedDestinationId">
                    <input type="hidden" name="total_amount" id="selectedTotalAmount">
                    
                    <div class="form-group">
                        <label for="travelDate">Travel Date *</label>
                        <input type="date" id="travelDate" name="travel_date" required min="{{ date('Y-m-d') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="fullName">Full Name *</label>
                        <input type="text" id="fullName" name="name" required value="{{ auth()->user()->name ?? '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required value="{{ auth()->user()->email ?? '' }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="specialRequests">Special Requests</label>
                        <textarea id="specialRequests" name="special_requests" rows="3" placeholder="Any special requirements or notes..."></textarea>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn-secondary" id="cancelBooking">Cancel</button>
                <button type="submit" class="btn-primary" id="confirmBooking">
                    <i class="fas fa-check"></i>
                    Confirm Booking
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Adventure Booking Form Styles */
.adventure-booking-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem;
    font-family: 'Inter', sans-serif;
}

.booking-header {
    text-align: center;
    margin-bottom: 3rem;
}

.booking-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.3);
}

.booking-icon i {
    font-size: 2rem;
    color: white;
}

.booking-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
}

.booking-title .highlight {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.booking-subtitle {
    font-size: 1.2rem;
    color: #6b7280;
    margin-bottom: 0;
}

/* Destinations Grid */
.destinations-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.destination-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.destination-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.destination-image {
    position: relative;
    height: 200px;
    overflow: hidden;
}

.destination-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.destination-card:hover .destination-image img {
    transform: scale(1.05);
}

.budget-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.budget-low {
    background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    color: white;
}

.budget-medium {
    background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    color: white;
}

.budget-expensive {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
}

.destination-content {
    padding: 1.5rem;
}

.destination-name {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 0.75rem;
}

.destination-description {
    color: #6b7280;
    font-size: 0.95rem;
    line-height: 1.5;
    margin-bottom: 1rem;
}

.destination-details {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 1.5rem;
}

.detail-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 0.9rem;
}

.detail-item i {
    color: #2563eb;
    width: 16px;
}

/* Pricing Section */
.pricing-section {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 1.5rem;
}

.price-display {
    text-align: center;
    margin-bottom: 1rem;
}

.price-label {
    display: block;
    font-size: 0.8rem;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

.price-amount {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1f2937;
    display: block;
}

.price-unit {
    font-size: 0.9rem;
    color: #6b7280;
}

.quantity-selector {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.quantity-label {
    font-weight: 600;
    color: #374151;
    font-size: 0.9rem;
}

.quantity-controls {
    display: flex;
    align-items: center;
    background: white;
    border-radius: 8px;
    padding: 0.25rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.quantity-btn {
    width: 32px;
    height: 32px;
    border: none;
    background: #f3f4f6;
    color: #6b7280;
    border-radius: 6px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.quantity-btn:hover {
    background: #e5e7eb;
    color: #374151;
}

.quantity-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.quantity-input {
    width: 60px;
    text-align: center;
    border: none;
    background: transparent;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0.5rem;
}

.total-price {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 2px solid #e5e7eb;
}

.total-label {
    font-weight: 600;
    color: #374151;
    font-size: 1.1rem;
}

.total-amount {
    font-size: 1.25rem;
    font-weight: 700;
    color: #2563eb;
}

/* Book Now Button */
.book-now-btn {
    width: 100%;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: white;
    border: none;
    padding: 1rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
}

.book-now-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
    background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
}

.book-now-btn:active {
    transform: translateY(0);
}

/* Modal Styles */
.booking-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    padding: 1rem;
}

.booking-modal.show {
    display: flex;
}

.modal-content {
    background: white;
    border-radius: 20px;
    max-width: 600px;
    width: 100%;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-50px) scale(0.9);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 2rem 2rem 1rem;
    border-bottom: 1px solid #e5e7eb;
}

.modal-header h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
    margin: 0;
}

.modal-close {
    width: 40px;
    height: 40px;
    border: none;
    background: #f3f4f6;
    color: #6b7280;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.modal-close:hover {
    background: #e5e7eb;
    color: #374151;
}

.modal-body {
    padding: 2rem;
}

.selected-destination-info {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 2rem;
    border: 1px solid #e5e7eb;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #e5e7eb;
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.2s ease;
    background: white;
}

.form-group input:focus,
.form-group textarea:focus {
    outline: none;
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
}

.modal-footer {
    display: flex;
    gap: 1rem;
    padding: 1rem 2rem 2rem;
    justify-content: flex-end;
}

.btn-secondary {
    padding: 0.875rem 1.5rem;
    border: 2px solid #e5e7eb;
    background: white;
    color: #6b7280;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-secondary:hover {
    border-color: #d1d5db;
    color: #374151;
}

.btn-primary {
    padding: 0.875rem 1.5rem;
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
}

/* Responsive Design */
@media (max-width: 768px) {
    .adventure-booking-container {
        padding: 1rem;
    }
    
    .destinations-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .booking-title {
        font-size: 2rem;
    }
    
    .destination-details {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .modal-content {
        margin: 1rem;
        max-height: calc(100vh - 2rem);
    }
    
    .modal-header,
    .modal-body,
    .modal-footer {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const destinationCards = document.querySelectorAll('.destination-card');
    const bookingModal = document.getElementById('bookingModal');
    const closeModal = document.getElementById('closeModal');
    const cancelBooking = document.getElementById('cancelBooking');
    const confirmBooking = document.getElementById('confirmBooking');
    const bookingForm = document.getElementById('bookingForm');
    
    let selectedDestination = null;
    
    // Quantity controls
    document.addEventListener('click', function(e) {
        if (e.target.closest('.quantity-btn')) {
            const btn = e.target.closest('.quantity-btn');
            const action = btn.dataset.action;
            const input = btn.parentElement.querySelector('.quantity-input');
            const destinationId = input.dataset.destination;
            const currentValue = parseInt(input.value);
            
            if (action === 'increase' && currentValue < 20) {
                input.value = currentValue + 1;
                updateTotalPrice(destinationId);
            } else if (action === 'decrease' && currentValue > 1) {
                input.value = currentValue - 1;
                updateTotalPrice(destinationId);
            }
        }
    });
    
    // Quantity input change
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('quantity-input')) {
            const destinationId = e.target.dataset.destination;
            updateTotalPrice(destinationId);
        }
    });
    
    // Update total price
    function updateTotalPrice(destinationId) {
        const card = document.querySelector(`[data-destination-id="${destinationId}"]`);
        const price = parseFloat(card.dataset.price);
        const quantity = parseInt(card.querySelector('.quantity-input').value);
        const total = price * quantity;
        
        const totalElement = card.querySelector('.total-amount');
        totalElement.textContent = `Rs ${total.toLocaleString()}`;
    }
    
    // Book Now button click
    document.addEventListener('click', function(e) {
        if (e.target.closest('.book-now-btn')) {
            const btn = e.target.closest('.book-now-btn');
            const destinationId = btn.dataset.destination;
            const card = document.querySelector(`[data-destination-id="${destinationId}"]`);
            
            selectedDestination = {
                id: destinationId,
                name: card.querySelector('.destination-name').textContent,
                description: card.querySelector('.destination-description').textContent,
                price: parseFloat(card.dataset.price),
                quantity: parseInt(card.querySelector('.quantity-input').value),
                total: parseFloat(card.dataset.price) * parseInt(card.querySelector('.quantity-input').value)
            };
            
            showBookingModal();
        }
    });
    
    // Show booking modal
    function showBookingModal() {
        const infoDiv = document.getElementById('selectedDestinationInfo');
        infoDiv.innerHTML = `
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-lg font-semibold text-gray-900">${selectedDestination.name}</h4>
                <span class="text-sm text-gray-500">${selectedDestination.quantity} traveler${selectedDestination.quantity > 1 ? 's' : ''}</span>
            </div>
            <p class="text-gray-600 mb-4">${selectedDestination.description}</p>
            <div class="flex justify-between items-center">
                <span class="text-sm text-gray-500">Total Amount:</span>
                <span class="text-xl font-bold text-blue-600">Rs ${selectedDestination.total.toLocaleString()}</span>
            </div>
        `;
        
        document.getElementById('selectedDestinationId').value = selectedDestination.id;
        document.getElementById('selectedTotalAmount').value = selectedDestination.total;
        
        bookingModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    
    // Close modal
    function closeBookingModal() {
        bookingModal.classList.remove('show');
        document.body.style.overflow = 'auto';
    }
    
    closeModal.addEventListener('click', closeBookingModal);
    cancelBooking.addEventListener('click', closeBookingModal);
    
    // Close modal on backdrop click
    bookingModal.addEventListener('click', function(e) {
        if (e.target === bookingModal) {
            closeBookingModal();
        }
    });
    
    // Form submission
    confirmBooking.addEventListener('click', function() {
        if (bookingForm.checkValidity()) {
            // Show loading state
            confirmBooking.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
            confirmBooking.disabled = true;
            
            // Submit form
            bookingForm.submit();
        } else {
            bookingForm.reportValidity();
        }
    });
});
</script>
