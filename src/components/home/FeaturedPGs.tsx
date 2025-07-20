import React from 'react';
import { Star, MapPin, Users, Wifi, Car, Utensils, Shield } from 'lucide-react';
import { Link } from 'react-router-dom';

const FeaturedPGs: React.FC = () => {
  // Mock data - replace with actual data from Firebase
  const featuredPGs = [
    {
      id: '1',
      title: 'Premium Boys PG in Greater Noida',
      location: 'Sector 62, Greater Noida',
      price: 12000,
      gender: 'Male',
      occupancy: 'Single',
      rating: 4.8,
      reviews: 24,
      image: 'https://images.pexels.com/photos/1743229/pexels-photo-1743229.jpeg?auto=compress&cs=tinysrgb&w=600',
      amenities: ['Wifi', 'Parking', 'Meals', 'Security'],
      featured: true
    },
    {
      id: '2',
      title: 'Comfort Girls PG in Gurgaon',
      location: 'DLF Phase 3, Gurgaon',
      price: 15000,
      gender: 'Female',
      occupancy: 'Double',
      rating: 4.6,
      reviews: 18,
      image: 'https://images.pexels.com/photos/1571460/pexels-photo-1571460.jpeg?auto=compress&cs=tinysrgb&w=600',
      amenities: ['Wifi', 'Meals', 'Security', 'Laundry'],
      featured: true
    },
    {
      id: '3',
      title: 'Modern Co-Living in Noida',
      location: 'Sector 18, Noida',
      price: 18000,
      gender: 'Unisex',
      occupancy: 'Single',
      rating: 4.9,
      reviews: 32,
      image: 'https://images.pexels.com/photos/1643383/pexels-photo-1643383.jpeg?auto=compress&cs=tinysrgb&w=600',
      amenities: ['Wifi', 'Parking', 'Meals', 'Gym'],
      featured: true
    }
  ];

  const getAmenityIcon = (amenity: string) => {
    switch (amenity.toLowerCase()) {
      case 'wifi': return <Wifi className="w-4 h-4" />;
      case 'parking': return <Car className="w-4 h-4" />;
      case 'meals': return <Utensils className="w-4 h-4" />;
      case 'security': return <Shield className="w-4 h-4" />;
      default: return null;
    }
  };

  return (
    <section className="py-20 bg-gray-50">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center mb-12">
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Featured PG Accommodations
          </h2>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Handpicked premium accommodations with best amenities and locations
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {featuredPGs.map((pg) => (
            <div key={pg.id} className="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group">
              {/* Image */}
              <div className="relative h-48 overflow-hidden">
                <img
                  src={pg.image}
                  alt={pg.title}
                  className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                />
                <div className="absolute top-4 left-4">
                  <span className="bg-gradient-to-r from-primary-600 to-secondary-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                    Featured
                  </span>
                </div>
                <div className="absolute top-4 right-4">
                  <span className={`px-3 py-1 rounded-full text-sm font-medium ${
                    pg.gender === 'Male' ? 'bg-blue-100 text-blue-800' :
                    pg.gender === 'Female' ? 'bg-pink-100 text-pink-800' :
                    'bg-purple-100 text-purple-800'
                  }`}>
                    {pg.gender}
                  </span>
                </div>
              </div>

              {/* Content */}
              <div className="p-6">
                <div className="flex items-center justify-between mb-2">
                  <h3 className="text-xl font-semibold text-gray-900 group-hover:text-primary-600 transition-colors">
                    {pg.title}
                  </h3>
                  <div className="flex items-center space-x-1">
                    <Star className="w-4 h-4 text-yellow-400 fill-current" />
                    <span className="text-sm font-medium text-gray-700">{pg.rating}</span>
                    <span className="text-sm text-gray-500">({pg.reviews})</span>
                  </div>
                </div>

                <div className="flex items-center text-gray-600 mb-4">
                  <MapPin className="w-4 h-4 mr-1" />
                  <span className="text-sm">{pg.location}</span>
                </div>

                <div className="flex items-center justify-between mb-4">
                  <div className="flex items-center space-x-4">
                    <div className="flex items-center text-sm text-gray-600">
                      <Users className="w-4 h-4 mr-1" />
                      {pg.occupancy}
                    </div>
                  </div>
                  <div className="text-right">
                    <div className="text-2xl font-bold text-gray-900">₹{pg.price.toLocaleString()}</div>
                    <div className="text-sm text-gray-500">per month</div>
                  </div>
                </div>

                {/* Amenities */}
                <div className="flex flex-wrap gap-2 mb-6">
                  {pg.amenities.map((amenity) => (
                    <div key={amenity} className="flex items-center space-x-1 bg-gray-100 px-3 py-1 rounded-full">
                      {getAmenityIcon(amenity)}
                      <span className="text-sm text-gray-700">{amenity}</span>
                    </div>
                  ))}
                </div>

                <div className="flex space-x-3">
                  <Link
                    to={`/listings/${pg.id}`}
                    className="flex-1 bg-primary-600 text-white text-center py-3 rounded-lg hover:bg-primary-700 transition-colors font-medium"
                  >
                    View Details
                  </Link>
                  <button className="flex-1 border border-primary-600 text-primary-600 py-3 rounded-lg hover:bg-primary-50 transition-colors font-medium">
                    Book Now
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>

        <div className="text-center mt-12">
          <Link
            to="/listings"
            className="inline-flex items-center px-8 py-3 bg-gradient-to-r from-primary-600 to-secondary-600 text-white rounded-lg hover:from-primary-700 hover:to-secondary-700 transition-all duration-300 font-semibold shadow-lg hover:shadow-xl"
          >
            View All PG Accommodations
          </Link>
        </div>
      </div>
    </section>
  );
};

export default FeaturedPGs;