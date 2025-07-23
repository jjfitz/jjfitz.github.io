FROM ruby:3.2.0-slim

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    git \
    curl \
    nodejs \
    npm \
    libffi-dev \
    libyaml-dev \
    && rm -rf /var/lib/apt/lists/*

# Create app directory
WORKDIR /srv/jekyll

# Install Jekyll & Bundler
RUN gem install bundler jekyll

# Copy your site files into the image
COPY . .

# Install gems (if you have a Gemfile)
RUN bundle install || true

EXPOSE 4000

CMD ["bundle", "exec", "jekyll", "serve", "--host=0.0.0.0"]
