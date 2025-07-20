import React from 'react';
import HeroSection from '../components/home/HeroSection';
import FeaturedPGs from '../components/home/FeaturedPGs';

const Home: React.FC = () => {
  return (
    <div className="min-h-screen">
      <HeroSection />
      <FeaturedPGs />
    </div>
  );
};

export default Home;