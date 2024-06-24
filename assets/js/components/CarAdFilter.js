// assets/components/CarFilters.js

import React, { useState } from 'react';

const CarFilters = () => {
    const [brand, setBrand] = useState('');
    const [mileage, setMileage] = useState('');
    const [price, setPrice] = useState('');

    const fetchFilteredCars = async (e) => {
        e.preventDefault();
        const response = await fetch(`/api/voitures?brand=${brand}&mileage=${mileage}&price=${price}`);
        const data = await response.json();
        const carsContainer = document.getElementById('cars-container');
        carsContainer.innerHTML = data.map(car_ad => `
            <div class="col">
                <div class="card h-100">
                    <a href="/car_ad/${car_ad.carId}" class="stretched-link">
                        <img src="/uploads/${car_ad.picture}" class="card-img-top" alt="${car_ad.brand}" style="width: 100%; height: 250px; object-fit: cover;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">${car_ad.brand}</h5>
                        <p class="card-text">
                            <strong>Prix :</strong> ${car_ad.price} €<br>
                            <strong>Année :</strong> ${car_ad.year}<br>
                            <strong>Kilométrage :</strong> ${car_ad.mileage} km
                        </p>
                        ${car_ad.manager ? `<p class="card-text"><small class="text-muted">Ajouté par ${car_ad.manager.name}</small></p>` : `<p class="card-text"><small class="text-muted">Ajouté par un utilisateur</small></p>`}
                    </div>
                </div>
            </div>
        `).join('');
    };

    return (
        <div className="mb-4">
            <h4>Filtrer les voitures</h4>
            <form onSubmit={fetchFilteredCars}>
                <div className="form-group">
                    <label htmlFor="brand">Marque</label>
                    <input type="text" className="form-control" id="brand" value={brand} onChange={(e) => setBrand(e.target.value)} placeholder="Marque"/>
                </div>
                <div className="form-group">
                    <label htmlFor="mileage">Kilométrage max</label>
                    <input type="number" className="form-control" id="mileage" value={mileage} onChange={(e) => setMileage(e.target.value)} placeholder="Kilométrage max"/>
                </div>
                <div className="form-group">
                    <label htmlFor="price">Prix max</label>
                    <input type="number" className="form-control" id="price" value={price} onChange={(e) => setPrice(e.target.value)} placeholder="Prix max"/>
                </div>
                <button type="submit" className="btn btn-primary mt-3">Filtrer</button>
            </form>
        </div>
    );
};

export default CarFilters;
